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
                    'order' => 'comments.id ASC',
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
            $this->redirect('users/index/' .$friend_id);
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
                $this->loadModel('User');
                $this->User->updatePostCount($_SESSION['id']);
                if($this->Request->data->target_id != $_SESSION['id'] || $this->Request->data->author_id != $_SESSION['id']) {
                    $this->loadModel('Notification');
                    $notif_target = $this->Request->data->target_id == $_SESSION['id'] ? $this->Request->data->author_id : $this->Request->data->target_id;
                    $this->Notification->send('posts', $this->Post->lastInsertId, $_SESSION['id'], $notif_target);
                }
                $this->Session->setFlash('Le message a bien été publié');
                $this->redirect($_SERVER['HTTP_REFERER'], true);
            } else {
                $this->Session->setFlash($this->Post->getErrors(), 'error');
                $this->redirect($_SERVER['HTTP_REFERER'], true);
            }
        }

    }
}