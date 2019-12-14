<?php namespace App\Helpers;

class Utils
{
    public static function pprint_r($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}