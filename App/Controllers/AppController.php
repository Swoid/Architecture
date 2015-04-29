<?php


namespace App\Controllers;

use Core\Controller;
use Core\Helpers\Cookies;

class AppController extends Controller
{
    public function beforeFilter()
    {
        $route = $this->Request->controller . '/' . $this->Request->action;

        if($route != 'users/connect' && $route != 'users/logout' && $route != 'users/clear' && $route != 'users/register') {
            if(isset($_COOKIE['username']) && isset($_COOKIE['token'])){
                if(!$this->Auth->rememberLogin(Cookies::get('username'))){
                    $this->redirect('users/connect');
                }
            } else {
                $this->redirect('users/connect');
            }
        }
    }
}