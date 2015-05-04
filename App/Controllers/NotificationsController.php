<?php


namespace App\Controllers;


class NotificationsController extends AppController
{

    public function getMessages()
    {
        $this->layout = 'empty';
        $d['notifs'] = $this->Notification->get(
            [
                'where' => 'ref = "messages" AND target_id = ' . $_SESSION['id'] . ' AND seen = 0',
                'limit' => 5
            ]
        );

        $this->set($d);
    }

    public function getMessageCount()
    {
        $this->layout = 'empty';
        $d['count'] = $this->Notification->getFirst(
            [
                'fields' => 'COUNT(id) as count',
                'where' => 'ref = "messages" AND target_id = ' . $_SESSION['id'] . ' AND seen = 0',
            ]
        );
        $this->set($d);
    }

} 