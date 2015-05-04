<?php


namespace App\Controllers;


class CommentsController extends AppController
{
    /**
     * Commenter un posts
     * @param $post_id
     */
    public function comment($post_id)
    {
        if (!is_numeric($post_id)) {
            $this->redirect($_SERVER['HTTP_REFERER'], true);
        }

        $this->loadModel('Post');
        $post = $this->Post->getFirst(['where'=>'id = ' . $post_id]);
        if(!$post) {
            $this->redirect($_SERVER['HTTP_REFERER'], true);
        }

        if ($this->Comment->validate($this->Request->data)) {
            $this->Request->data->author_id = $_SESSION['id'];
            $this->Request->data->post_id = $post_id;
            $this->Comment->create($this->Request->data);
            // On ne s'envoit pas de notif à soi-même
            if($post->target_id != $_SESSION['id'] || $post->author_id != $_SESSION['id']) {
                $this->loadModel('Notification');
                $notif_target = $post->target_id == $_SESSION['id'] ? $post->author_id : $post->target_id;
                $this->Notification->send('comments', $this->Comment->lastInsertId, $_SESSION['id'], $notif_target);
            }
            $this->Post->updateCommentCount($post_id);
            $this->Session->setFlash('Commentaire ajouté');
        } else {
            $this->Session->setFlash($this->Comment->getErrors(), 'error');
        }

        $this->redirect($_SERVER['HTTP_REFERER'], true);
    }
} 