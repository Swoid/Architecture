<?php


namespace Core\Helpers;


class Html
{
    public static function css($name)
    {
        return " <link rel='stylesheet' type='text/css' href='" . ASSETS . "css/" . $name . ".css'>";
    }

    public static function img($name)
    {
        return '<img src="' . ASSETS . 'img/' . $name . '">';
    }

    public static function script($name)
    {
        return '<script type="text/javascript" src="'. ASSETS .'js/' . $name . '.js"></script>';
    }

    public static function href($link){
        return ROOT . $link;
    }
}