<?php


namespace App\Controllers;


use Core\Helpers\Cookies;

class UsersController extends AppController
{
    public function connect()
    {
        $this->layout = 'log';
        $d['errors'] = [];
        if($this->Request->isPost) {
            if($this->User->validate($this->Request->data)) {
                if($this->Auth->login($this->Request->data)){
                    $this->redirect('posts/index');
                }else{
                    $d['errors'] = $this->User->errors();
                }
            }else {
                $d['errors'] = $this->User->errors();
            }
        }
        $this->set($d);
    }

    public function register()
    {
        $this->layout = 'log';
        $d['errors'] = [];
        if($this->Request->isPost){
            if($this->User->validate($this->Request->data)) {
                $this->Auth->register($this->Request->data);
            }else {
                $d['errors'] = $this->User->errors();
            }
        }
        $this->set($d);
    }

    public function logout()
    {
        $this->Auth->logout();
        $this->redirect('users/connect');
    }

    public function clear()
    {
        Cookies::remove('username');
        Cookies::remove('token');
        unset($_SESSION['id']);
        $this->redirect('users/connect');
    }
} 