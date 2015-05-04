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
        date_default_timezone_set('Europe/Brussels');

        return strftime("Le %d %B %Y à %H:%M", strtotime($date));
    }
} 