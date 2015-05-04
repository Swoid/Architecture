<?php


namespace App\Controllers;


class NotificationsController extends AppController
{

    /**
     * Récupère les notifications de message
     */
    public function getMessages()
    {
        $this->layout = 'empty';
        $d['notifs'] = $this->Notification->get(
            [
                'fields'=> 'messages.author_id, avatar, text, messages.date',
                'joins' => ['users','messages'],
                'where' => "ref = 'messages' AND notifications.target_id = " . $_SESSION['id'] . " AND notifications.seen = 0",
                'limit' => 5
            ]
        );

        $this->set($d);
    }

    /**
     * Récupère le nombre de messages non lus
     */
    public function getMessageCount()
    {
        $this->layout = 'empty';
        $count = $this->Notification->getFirst(
            [
                'fields' => 'COUNT(id) as count',
                'where' => 'ref = "messages" AND notifications.target_id = ' . $_SESSION['id'] . ' AND notifications.seen = 0',
            ]
        );
        $count = $count->count;
        $this->view = 'count';
        $this->set('count',$count);
    }

    /**
     * Récupère les notifications de commentaire
     */
    public function getComments()
    {
        $this->layout = 'empty';
        $d['notifs'] = $this->Notification->get(
            [
                'fields'=> 'comments.post_id, avatar, text, comments.date',
                'joins' => ['users','comments'],
                'where' => "ref = 'comments' AND notifications.target_id = " . $_SESSION['id'] . " AND notifications.seen = 0",
                'limit' => 5
            ]
        );

        $this->set($d);
    }

    /**
     * Récupère le nombre de commentaires et demande d'amis non lus
     */
    public function getOtherCount()
    {
        $this->layout = 'empty';

        $comments_count = $this->Notification->getFirst(
            [
                'fields' => 'COUNT(id) as count',
                'where' => 'ref = "comments" AND notifications.target_id = ' . $_SESSION['id'] . ' AND notifications.seen = 0',
            ]
        );
        $friends_count = $this->Notification->getFirst(
            [
                'fields' => 'COUNT(id) as count',
                'where' => 'ref = "friends" AND notifications.target_id = ' . $_SESSION['id'] . ' AND notifications.seen = 0',
            ]
        );

        $count = $comments_count->count + $friends_count->count;
        $this->view = 'count';
        $this->set('count', $count);
    }

} 