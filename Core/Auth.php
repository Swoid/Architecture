<?php


namespace Core;


class Auth 
{
    public function register($userModel, $data){
        $data->password = sha1($data->password);
        $userModel->create($data, 'users');
    }

    public function login($userModel, $data){
        $user = $userModel->getLogged(addslashes($data->username));
        if ($user) {
            // on évite les collisions avec une surcouche de cryptage
            if (sha1($data->password) != $user->password) {
                return false;
            } else {
                $_SESSION['id'] = $user->id;
                if(isset($data->remember)) {
                    Cookies::set('username',$user->username);
                }
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
    }
} 