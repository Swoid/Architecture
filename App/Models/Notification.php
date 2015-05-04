<?php


namespace App\Models;


class Notification extends AppModel
{
    public function markMessagesAsRead($friend_id, $user_id)
    {
        $sql = "UPDATE notifications SET seen = 1 WHERE author_id = $friend_id  AND target_id = $user_id";
        $this->db->query($sql);
    }
}