<?php


namespace Core;


use Core\Helpers\Cookies;

class Auth extends Model
{
    public function register($data){
        $data->password = sha1($data->password);
        $this->create($data, 'users');
    }

    public function login($data){
        $user = $this->getLogged(addslashes($data->username));
        if ($user) {
            // on évite les collisions avec une surcouche de cryptage
            if (sha1($data->password) != $user->password) {
                return false;
            } else {
                $_SESSION['id'] = $user->id;
                if(isset($data->remember)) {
                    Cookies::set('username',$user->username);
                    Cookies::set('token',sha1($user->username . $user->id));
                }
                return true;
            }
        } else {
            return false;
        }
    }

    public function rememberLogin($username)
    {
        $user = $this->getLogged($username);
        if($user) {
            if (sha1($user->username . $user->id) != Cookies::get('token')) {
                return false;
            } else {
                $_SESSION['id'] = $user->id;
                Cookies::set('username',$user->username);
                Cookies::set('token',Cookies::get('token'));
                return true;
            }
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['id']);
        Cookies::remove('username');
        Cookies::remove('token');
    }
} 