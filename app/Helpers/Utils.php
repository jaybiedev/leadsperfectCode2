<?php namespace App\Helpers;

class Utils
{
    public static function pprint_r($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public static function arrayStripos($haystack, $needles, $offset=0) {
        $found = false;
        foreach($needles as $needle) {
            $found[$needle] = stripos($haystack, $needle, $offset);
        }
        return $found;
    }
}