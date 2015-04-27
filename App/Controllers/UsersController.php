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
                if($this->Auth->login($this->User,$this->Request->data)){
                   header("Location: " . ROOT . 'messages/index');
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
                $this->Auth->register($this->User,$this->Request->data);
            }else {
                $d['errors'] = $this->User->errors();
            }
        }
        $this->set($d);
    }

    public function logout()
    {
        $this->Auth->logout();
        header("Location: " . ROOT . 'users/connect');
    }

    public function clear()
    {
        Cookies::remove('username');
        unset($_SESSION['id']);
        header("Location: " . ROOT . 'users/connect');
    }
} 