<?php


namespace App\Controllers;


class PostsController extends AppController
{
    public function index(){
        $d['posts'] = $this->Post->getHomePosts($_SESSION['id']);
        $this->loadModel('Comment');
        foreach ($d['posts'] as $post) {
            $post->comments = $this->Comment->get(
                [
                    'where'=>'post_id = '.$post->p_id,
                    'order'=>'date DESC',
                    'joins' => ['users']
                ]
            );
        }
        $this->set($d);
    }
} 