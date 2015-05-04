<?php


namespace App\Models;


use Core\Validator;

class Comment extends AppModel
{

    use Validator;

    public $joins = [
        'users' => 'author_id'
    ];

    public $validationRules = [
        'text' => [
            ['ruleName'=>'required', 'message'=>'Un commentaire vide, c‘est pas cool...']
        ]
    ];
} 