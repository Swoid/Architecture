<?php


namespace App\Models;


class Notification extends AppModel
{
    public $joins = [
        'messages' => 'ref_id',
        'users'    => 'author_id',
        'comments' => 'ref_id',
        'relations'=> 'author_id',
        'posts'    => 'ref_id'
    ];

    /**
     * Marque un message comme étant lu
     * @param $friend_id
     * @param $user_id
     */
    public function markAsRead($ref, $friend_id, $user_id)
    {
        $sql = "UPDATE notifications SET seen = 1 WHERE author_id = $friend_id  AND target_id = $user_id AND ref = '$ref'";
        $this->db->query($sql);
    }


    /**
     * Envoyer une notification
     * @param $ref
     * @param $ref_id
     * @param $author_id
     * @param $target_id
     */
    public function send($ref, $ref_id, $author_id, $target_id)
    {
        $sql = "INSERT INTO notifications (ref, ref_id, author_id, target_id) VALUES ('$ref', $ref_id, $author_id, $target_id)";
        $this->db->query($sql);
    }
}