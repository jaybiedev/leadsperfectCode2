<?php namespace App\Helpers\Finance;

use App\Helpers\Utils;

class FinanceUtils
{
    
    // @todo: use time function
    public static function timeElapse($t1, $t2)
    {
        
        $a1 = explode(':',$t1);
        $a2 = explode(':',$t2);
        $hr = intval($a2[0]) - intval($a1[0]);
        if ($a2[1] > $a1[1])
            $min .= intval($a2[1]) - intval($a1[1]);
        else
        {
            $hr--;
            $min .= intval($a2[1])+ 60 - $a1[1];
        }	
        $elapse = $hr.":".$min;
        return $elapse;
        
    }

    //military to civilian time
    // @todo: use date function
    public static function m2c($time)
    {
        $time_string = explode(':',$time);
        if (intval($time_string[0]) < 12)
        {
            $new_time = $time_string[0].':'.$time_string[1].'a';
        }
        elseif (intval($time_string[0]) == 12)
        {
            $new_time = $time_string[0].':'.$time_string[1].'n';
        }
        else
        {
            $hrs = intval($time_string[0])-12;
            $new_time = $hrs.':'.$time_string[1].'p';
        }
        return $new_time;
    }

    public static function fAgebal($date_loan, $date_birth)
    {
        // @todo: should use date functions instead
        $date_l = Utils::ymd2mdy($date_loan);
        $date_b = Utils::ymd2mdy($date_birth);
        $y0 = substr($date_l,6,4);
        $m0 = substr($date_l,0,2);
        $d0 = substr($date_l,3,2);
        $y = substr($date_b,6,4);
        $m = substr($date_b,0,2);
        $d = substr($date_b,3,2);
        $years  = $y0 - $y;
        $months = $m0 - $m;
        $days   = $d0 - $d;
        if (substr($months, 0, 1) == '-') {
        $years = $years - 1;
        $months = 12 - substr($months, 1);
        }

        $ybal = 64 - $years;
        $mbal = 12 - $months;
        if (substr($days, 0, 1) == '-') {
        $days = date('t') - substr($days, 1);
        $days = $d - $d0;
        $mbal++;
        }
        if ($years >= 65) $agebal = 0;
        else
        {
            $agebal = $ybal*12 + $mbal -1;
        }
        return $agebal;
    }

   
}