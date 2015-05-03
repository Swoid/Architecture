<?php


namespace App\Controllers;


class MessagesController extends AppController
{
    public $layout = 'message';

    /**
     * Affiche une conversation
     * @param $friend_id
     */
    public function conversation($friend_id)
    {
        if (!is_numeric($friend_id)) {
            $this->Session->setFlash('Cet utilisateur n‘existe pas');
            $this->redirect('users/index');
        }

        $this->loadModel('User');
        $d['target'] = $this->User->getFirst(['where' => 'id=' . $friend_id]);
        $d['me'] = $this->User->getFirst(['where' => 'id=' . $_SESSION['id']]);
        $d['messages'] = $this->Message->get([
            'where'=> " (author_id = $friend_id  AND target_id = {$_SESSION['id']}) || (author_id = {$_SESSION['id']}  AND target_id = $friend_id)",
            "joins" => ['users'],
            "order" => 'date ASC'
        ]);
        $this->set($d);
    }

    /**
     * Envoyer un message
     * @param $target_id
     */
    public function send($target_id)
    {
        if (!is_numeric($target_id)) {
            $this->Session->setFlash('Cet utilisateur n‘existe pas');
            $this->redirect('users/index');
        }

        if( $this->Request->isPost) {
            if($this->Message->validate($this->Request->data)) {
                $this->Request->data->target_id = $target_id;
                $this->Request->data->author_id = $_SESSION['id'];
                $this->Message->create($this->Request->data);
                $this->redirect('messages/conversation/' . $target_id);
            } else {
                $this->Session->setFlash($this->Message->getErrors(),'error');
                $this->redirect('messages/conversation/' . $target_id);
            }
        } else {
            $this->redirect('messages/conversation/' . $target_id);
        }
    }
} 