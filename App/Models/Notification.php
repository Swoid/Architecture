<?php


namespace App\Models;


class Notification extends AppModel
{
    public $joins = [
        'messages' => 'ref_id',
        'users'    => 'author_id',
        'comments' => 'ref_id',
        'relations'=> 'author_id'
    ];

    /**
     * Marque un message comme étant lu
     * @param $friend_id
     * @param $user_id
     */
    public function markMessagesAsRead($friend_id, $user_id)
    {
        $sql = "UPDATE notifications SET seen = 1 WHERE author_id = $friend_id  AND target_id = $user_id";
        $this->db->query($sql);
    }
}