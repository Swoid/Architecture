<?php


namespace App\Models;


use Core\Validator;

class User extends AppModel
{
    use Validator;

    public $validationRules = [
        'username' => [
            ['ruleName'=>'required'],
            ['ruleName'=>'isString']
        ],
        'password' => [
            ['ruleName'=>'required'],
            ['ruleName'=>'isString']
        ]
    ];
} 