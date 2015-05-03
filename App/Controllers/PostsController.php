<?php


namespace App\Controllers;


use Core\Helpers\Image;

class PostsController extends AppController
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        $d['posts'] = $this->Post->getHomePosts($_SESSION['id']);
        $this->loadModel('Comment');
        $this->loadModel('User');
        $i = 0;
        foreach ($d['posts'] as $post) {
            $post->i = $i;
            $i++;
            if ($post->author_id != $post->target_id) {
                $post->target = $this->User->getFirst(['where' => 'id = ' . $post->target_id]);
            }
            $post->comments = $this->Comment->get(
                [
                    'where' => 'post_id = ' . $post->p_id,
                    'order' => 'date DESC',
                    'joins' => ['users']
                ]
            );
        }
        $this->set($d);
    }

    /**
     * Publier un message
     */
    public function selfPublish()
    {
        $this->publish();
    }

    /**
     * Publier un message sur le profil d'un ami
     * @param $friend_id
     */
    public function friendPublish($friend_id)
    {
        if (!is_numeric($friend_id)) {
            $this->Session->setFlash('Cet utilisateur n‘existe pas');
            $this->redirect($this->Request->referer);
        }
        $this->publish($friend_id);
    }

    /**
     * Réalise la publication
     * @param null $target_id
     */
    private function publish($target_id = null)
    {
        if (!$target_id) {
            $target_id = $_SESSION['id'];
        }

        if ($this->Request->isPost) {
            if ($_FILES['image']['name'] == '') {
                $this->Post->validationRules = [
                    "text" => [
                        ['ruleName' => 'required', 'message' => 'Du texte c‘est mieux'],
                        ['ruleName' => 'isString', 'message' => 'Du texte c‘est mieux']
                    ]
                ];
            } else {
                if (!$_FILES['image']['error']) {
                    $ext = '.' . end(explode('.', $_FILES['image']['name']));
                    $name = md5(time() . $_FILES['image']['name']) . $ext;
                    $dest = './App/Assets/img/uploads/posts/';
                    $this->Request->data->image = 'uploads/posts/' . $name;
                    Image::uploadImg($dest, $name);
                }
            }
            if ($this->Post->validate($this->Request->data)) {
                $this->Request->data->author_id = $_SESSION['id'];
                $this->Request->data->target_id = $target_id;
                $this->Post->create($this->Request->data);
                $this->Session->setFlash('Le message a bien été publié');
                $this->redirect($this->Request->referer);
            } else {
                $this->Session->setFlash($this->Post->getErrors(), 'error');
                $this->redirect($this->Request->referer);
            }
        }

    }
}