<?php


namespace App\Controllers;


class UsersController extends AppController
{
    public function login()
    {
        $this->layout = 'log';
        $d['errors'] = [];
        if($this->Request->isPost) {
            if($this->User->validate($this->Request->data)) {
                if($this->Auth->login($this->User,$this->Request->data)){
                    die('ouiiiiiiii');
                }else{
                    die("noooooon");
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
} 