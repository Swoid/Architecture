<?php


namespace App\Models;


use Core\Validator;

class Post extends AppModel
{
    use Validator;

    /**
     * Les tables liées
     * @var array
     */
    public $joins = [
        'users' => 'author_id',
        'comments'=> 'post_id',
    ];

    public $validationRules;

    /**
     * Récupère tous les posts à afficher sur l'accueil
     * @param $user_id
     * @return mixed
     */
    public function getHomePosts($user_id)
    {
        $sql = 'SELECT DISTINCT
                  author_id, target_id, date, text, comment_count, posts.id as p_id, image,
                  firstname, lastname, avatar, users.id as u_id
                FROM posts
                LEFT JOIN users ON users.id = posts.author_id
                LEFT JOIN relations ON user_id = users.id
                WHERE friend_id = :user_id OR ( friend_id != :user_id AND user_id = :user_id )
                ORDER BY posts.id DESC';
        $pdost = $this->db->prepare($sql);
        $pdost->execute([':user_id'=>$user_id]);
        return $pdost->fetchAll();
    }
} 