<?php


namespace App\Controllers;


use Core\Helpers\Cookies;

class UsersController extends AppController
{
    /**
     * Se connecter
     */
    public function connect()
    {
        $this->layout = 'log';
        $d['errors'] = [];
        if ($this->Request->isPost) {
            if ($this->User->validate($this->Request->data)) {
                if ($this->Auth->login($this->Request->data)) {
                    $this->redirect('posts/index');
                } else {
                    $d['errors'] = $this->User->errors();
                }
            } else {
                $d['errors'] = $this->User->errors();
            }
        }
        $this->set($d);
    }

    /**
     * S'enregistrer
     */
    public function register()
    {
        $this->layout = 'log';
        $d['errors'] = [];
        if ($this->Request->isPost) {
            if ($this->User->validate($this->Request->data)) {
                $this->Auth->register($this->Request->data);
            } else {
                $d['errors'] = $this->User->errors();
            }
        }
        $this->set($d);
    }

    /**
     * Se deconnecter
     */
    public function logout()
    {
        $this->Auth->logout();
        $this->redirect('users/connect');
    }

    /**
     * Ce n'est pas vous ?
     */
    public function clear()
    {
        Cookies::remove('username');
        Cookies::remove('token');
        unset($_SESSION['id']);
        $this->redirect('users/connect');
    }

    /**
     * Page perso
     * @param $id
     */
    public function index($id)
    {
        $this->layout = 'perso';
        $this->loadModel('Post');

        $d['user'] = $this->User->getFirst(['where' => 'id=' . $id]);
        $d['ownPosts'] = $this->Post->get(
            [
                'fields'=>'posts.id as p_id, text, avatar, firstname, lastname, comment_count, posts.date, author_id, target_id',
                'where' => 'author_id = ' . $id . ' AND target_id = ' . $id,
                'joins' => ['users'],
                'order' => 'posts.id DESC'
            ]
        );
        $this->loadModel('Comment');
        foreach ($d['ownPosts'] as $oPost) {
            $oPost->comments = $this->Comment->get(
                [
                    'where' => 'post_id = ' . $oPost->p_id,
                    'order' => 'comments.id DESC',
                    'joins' => ['users']
                ]
            );
            if($oPost->author_id != $oPost->target_id) {
                $oPost->target = $this->User->getFirst(
                  [
                      'fields' => 'id, lastname, firstname',
                      'where'  => 'id = ' . $oPost->target_id
                  ]
                );
            }
        }

        $d['isFriend'] = $this->User->isFriend($_SESSION['id'],$id);

        $d['recevedPosts'] = $this->Post->get(
            [
                'fields'=>'posts.id as p_id, text, avatar, firstname, lastname, comment_count, posts.date',
                'where' => 'target_id = ' . $id . ' AND author_id != ' . $id,
                'joins' => ['users']
            ]
        );
        foreach ($d['recevedPosts'] as $rPost) {
            $rPost->comments = $this->Comment->get(
                [
                    'fields'=> 'avatar, comments.text, comments.date',
                    'where' => 'post_id = ' . $rPost->p_id,
                    'order' => 'comments.id DESC',
                    'joins' => ['users']
                ]
            );
        }
        $this->set($d);
    }

    /**
     * Afficher les contacts d'un utilisateur
     * @param $user_id
     */
    public function friends($user_id){

        if (!is_numeric($user_id)) {
            $this->Session->setFlash('Cet utilisateur n‘existe pas');
            $this->redirect($this->Request->referer);
        }

        $this->layout = 'perso';
        $d['friends'] = $this->User->getFriends($user_id);

        $this->set($d);
    }
}