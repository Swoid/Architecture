<?php


namespace Core\Helpers;


class Date 
{
    /**
     * Formate une date en français
     * @param $date
     * @return string
     */
    public static function dateToFr($date)
    {
        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        return strftime("Le %d %B %Y à %H:%M", strtotime($date));
    }
} 