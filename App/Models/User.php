<?php


namespace App\Models;


use Core\Validator;

class User extends AppModel
{
    use Validator;

    public $validationRules = [
        'username' => [
            ['ruleName' => 'required'],
            ['ruleName' => 'isString']
        ],
        'password' => [
            ['ruleName' => 'required'],
            ['ruleName' => 'isString']
        ]
    ];

    /**
     * Vérifie qu'un utilisateur fait parti de nos contact
     * @param $user_id
     * @param $friend_id
     * @return mixed
     */
    public function isFriend($user_id, $friend_id)
    {
        $sql = 'SELECT COUNT(users.id) as count FROM users
                LEFT JOIN  relations ON user_id = users.id
                WHERE user_id = :user_id AND friend_id = :friend_id';
        $pdost = $this->db->prepare($sql);
        $pdost->execute([':user_id' => $user_id, ':friend_id' => $friend_id]);

        return $pdost->fetch()->count;
    }

    /**
     * Récupère les amis d'un utilisateur
     * @param $user_id
     * @return array
     */
    public function getFriends($user_id)
    {
        $sql = 'SELECT avatar, firstname, lastname, users.id FROM users
                LEFT JOIN relations ON friend_id = users.id
                WHERE user_id = :user_id';
        $pdost = $this->db->prepare($sql);
        $pdost->execute([':user_id' => $user_id]);
        return $pdost->fetchAll();
    }
} 