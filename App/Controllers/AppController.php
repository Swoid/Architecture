<?php


namespace App\Controllers;

use Core\Controller;
use Core\Helpers\Cookies;

class AppController extends Controller
{
    public function beforeFilter()
    {
        $route = $this->Request->controller . '/' . $this->Request->action;
        if( $route != 'users/connect') {
            if(!isset($_COOKIE['username']) || !isset($_COOKIE['token'])) {
                header('Location: ' . ROOT . 'users/connect');
            } else {
                if(!$this->Auth->rememberLogin(Cookies::get('username'))) {
                    header('Location: ' . ROOT . 'users/connect');
                }
            }
        }
    }
}