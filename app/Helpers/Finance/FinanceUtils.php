<?php namespace App\Helpers;

class FinanceUtils
{
    public static function space($sp)
    {
        $s = str_repeat(" ",$sp);
        return $s;
    }
    
    public static function adjustSize($s, $size)
    {
        if (strlen($s) > $size)
        {
            $s = substr($s,0,$size);
        }
        else
        {
            $s = str_pad($s,$size);
        }
        
        return $s;
    }
    
    
    public static function center($s,$size)
    {
        $s = str_pad($s,$size," ",STR_PAD_BOTH);
        return $s;
    }
    
    public static function adjustRight($s,$size)
    {
        $s = str_pad($s,$size," ",STR_PAD_LEFT);
        return $s;
    }
    
    // @todo: use date function
    public static function udate($ymd)
    {
        $mdy = self::ymd2mdy($ymd);
        $ud  = substr($mdy,0,6).substr($mdy,8,10);
        return $ud;
    }
    
    // @todo: use date function
    public static function ymd2mdy($ymd)
    {
        $a = explode("-",$ymd);
        return "$a[1]/$a[2]/$a[0]";
    }
    
    // @todo: use date function
    public static function mdy2ymd($mdy)
    {
        $a = explode("/",$mdy);
        return "$a[2]-$a[0]-$a[1]";
    }
    
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
        $date_l = self::ymd2mdy($date_loan);
        $date_b = self::ymd2mdy($date_birth);
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

    public static function numWord($num)
    {
        $Ones[1] = "ONE";
        $Ones[2] = "TWO";
        $Ones[3] = "THREE";
        $Ones[4] = "FOUR";
        $Ones[5] = "FIVE";
        $Ones[6] = "SIX";
        $Ones[7] = "SEVEN";
        $Ones[8] = "EIGHT";
        $Ones[9] = "NINE";
        $Ones[10] = "TEN";
        $Ones[11] = "ELEVEN";
        $Ones[12] = "TWELVE";
        $Ones[13] = "THIRTEEN";
        $Ones[14] = "FOURTEEN";
        $Ones[15] = "FIFTEEN";
        $Ones[16] = "SIXTEEN";
        $Ones[17] = "SEVENTEEN";
        $Ones[18] = "EIGHTEEN";
        $Ones[19] = "NINETEEN";
        $Tens[1] = "TEN";
        $Tens[2] = "TWENTY";
        $Tens[3] = "THIRTY";
        $Tens[4] = "FORTY";
        $Tens[5] = "FIFTY";
        $Tens[6] = "SIXTY";
        $Tens[7] = "SEVENTY";
        $Tens[8] = "EIGHTY";
        $Tens[9] = "NINETY";

        $tn=0;
        $wrdn='';
        if ($num >= 1000000) {
            $tn = intval($num/1000000);
            if ($tn>=1) {
                $tnh = intval($tn/100);
                if ($tnh >= 1) {
                    $wrdn = $Ones[$tnh].' HUNDRED';
                }  
                $tno = $tn-($tnh*100);
                $tnt = intval($tno/10);
                if  ($tnt>1) {
                    $wrdn = $wrdn + ' ' + $Tens[$tnt];
                    $nn   = $tno-$tnt*10;
                    if ($nn>=1) {
                        $wrdn .=  ' ' . $Ones[$nn];
                    }
                }   
                elseif ($tnt==1) {
                    $wrdn .=  ' ' . $Ones[$tno];
                }
                elseif ($tno>0) {
                    $wrdn .=  ' ' . $Ones[$tno];
                }   
                $wrdn=$wrdn+' MILLION';
            }
        }
        $nm = $num-$tn*1000000;
        
        if ($nm >= 1000)
        {
            $tn = intval($nm/1000);

            if ($tn>=1) {
                $tnh = intval($tn/100);
                if ($tnh >= 1) {
                    $wrdn .= ' '.$Ones[$tnh].' HUNDRED';
                }
                
                $tno = $tn-($tnh*100);
                $tnt = intval($tno/10);

                if ($tnt>1) {
                    $wrdn .= ' ' . $Tens[$tnt] ;
                    $nn   = $tno-$tnt*10;
                    if ($nn>=1) {
                        $wrdn .= ' ' .$Ones[$nn];
                    }
                }    
                elseif ($tnt==1) {
                    $wrdn .=  ' ' .$Ones[$tno];
                }  
                elseif ($tno>0) {
                    $wrdn .=  ' ' . $Ones[$tno];
                }
                
                $wrdn .= ' THOUSAND';

            }
        }
        
        $tnm = $nm-$tn*1000;
        $tnh = intval($tnm/100);
        if ($tnh >= 1) {
            $wrdn .= ' '.$Ones[$tnh].' HUNDRED';
        }  
        
        $tno = $tnm-($tnh*100);
        $tnt = intval($tno/10);
        
        if ($tnt>1) {
            $wrdn .=  ' ' . $Tens[$tnt];
            $nn   = $tno-$tnt*10;
            if ($nn>=1) {
                $wrdn .= ' ' . $Ones[$nn];
            }  
        }    
        elseif ($tnt==1) {
            $wrdn .= ' '. $Ones[$tno];
        }    
        elseif (intval($tno)>0) {
            $wrdn .= ' ' . $Ones[$tno];
        }    
        
        $cnts=($nm-intval($nm))*100;
        if ($cnts != 0) {
            if (strlen($wrdn)<2) {
                $wrdn .= ltrim(substr($cnts,0,2)).'/100';
            }  
            $wrdn .= ' AND '.ltrim(substr($cnts,0,2)).'/100';
        }
        return $wrdn;
    }
}