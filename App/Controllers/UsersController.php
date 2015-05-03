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
                'where' => 'author_id = ' . $id,
                'joins' => ['users']
            ]
        );
        foreach ($d['ownPosts'] as $oPost) {
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
                'where' => 'target_id = ' . $id . ' AND author_id != ' . $id,
                'joins' => ['users']
            ]
        );

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