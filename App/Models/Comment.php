<?php


namespace App\Models;


class Comment extends AppModel
{
    public $joins = [
        'users' => 'author_id'
    ];
} 