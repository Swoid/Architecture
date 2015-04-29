<?php


namespace App\Controllers;


class PostsController extends AppController
{
    public function index(){
        $d['posts'] = $this->Post->getHomePosts($_SESSION['id']);
        $this->loadModel('Comment');
        $this->loadModel('User');
        foreach ($d['posts'] as $post) {
            if($post->author_id != $post->target_id) {
                $post->target = $this->User->getFirst(['where'=>'id = ' . $post->target_id]);
            }
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