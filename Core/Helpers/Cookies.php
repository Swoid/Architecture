<?php


namespace Core;


class Cookies 
{
    /**
     * Récupère la valeur d'un cookie
     * @param $key
     * @return bool
     */
    public static function get($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : false;
    }

    /**
     * Créer un cookie
     * @param $key
     * @param $value
     * @param null $time
     * @return bool
     */
    public static function set($key, $value, $time = null)
    {
        if(is_null($time)) {
            $time = time() + 7 * 24 * 3600;
        }

        setcookie($key,$value,$time);

        return true;
    }

    /**
     * Supprime un cookie
     * @param $key
     * @return bool
     */
    public static function remove($key)
    {
        setcookie($key,"",time() - 7 * 24 * 3600);

        return true;
    }
} 