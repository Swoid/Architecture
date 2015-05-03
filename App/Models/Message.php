<?php


namespace App\Models;


use Core\Validator;

class Message extends AppModel
{
    use Validator;

    public $joins = [
        'users' => 'author_id'
    ];

    public $validationRules = [
      'text' => [
          ['ruleName'=>'required', 'message' => 'Veuillez entrer un message !']
      ]
    ];

} 