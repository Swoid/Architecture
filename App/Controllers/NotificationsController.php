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
                'fields'=> 'messages.author_id, avatar, text',
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
        $d['count'] = $this->Notification->getFirst(
            [
                'fields' => 'COUNT(id) as count',
                'where' => 'ref = "messages" AND notifications.target_id = ' . $_SESSION['id'] . ' AND notifications.seen = 0',
            ]
        );
        $this->set($d);
    }

} 