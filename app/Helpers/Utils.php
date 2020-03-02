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

    public static function getBoolean($val) 
    {
        if ($val === false)
            return $val;
        if ($val === true)
            return true;
        
        $upper = strtoupper($val);
        if (empty($val) || $val == '0' || $upper == 'FALSE' || $upper == 'F')
            return false;
        
        return true;
    }

    public static function getDate($date='', $format='') {

        $mdate = "";
        if (DEFINED("DATE_FORMAT")) {
            $format = DATE_FORMAT;
        }

        if (empty($format)) {
            $format = 'm/d/Y';
        }

        if (empty($date)) {
            $mdate = date($format);
        }
        else {
            $mdate = date($format, strtotime($date));
        }

        return $mdate;

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

    public static function getRawNumber($num) {
        $number = (float)str_replace(",", "", $num);
        return $number;
    }
    
    public static function arrayKeyValueImplode($glue=",", $input=[], $operator="=") {

        $output = implode($glue, array_map(
            function ($v, $k) { 
                return sprintf("%s [operator] '%s'", $k, $v); 
            },
            $input,
            array_keys($input)
        ));

        $output = str_replace("[operator]", $operator, $output);

        return $output;
    }

    public static function number_format2($n,$d)
    {
        if ($n == 0)
            return '';
        else
            return number_format($n,$d);
    }

    public function monthDiff($d1,$d2)
    {
        $a1 = explode('/',$d1);
        $a2 = explode('/',$d2);
        
        //must be modified
        $diff = $a2[0] - $a1[0];
        return $diff;
    }

    public static function doPrint($pln)
    {
        // global $SYSCONF;
        $serverPort = $_SERVER['REMOTE_ADDR'];	

        if ($SYSCONF['serverPort'] == '')
        {
            $Q = "select * from printque where source_ip='$serverPort'";
            
            $QR = @pg_query($Q) or message("Error querying printer database...");
            if (@pg_num_rows($QR) > 0)
            {
                $R = @pg_fetch_object($QR);
                $destination_ip = $R->destination_ip;
                $SYSCONF['serverPort'] = $destination_ip;
            }	
            else
            {
                $SYSCONF['serverPort'] = $serverPort;
            }

        }	
        $dest = $SYSCONF['serverPort'] ;
        
        $printType = $SYSCONF['PRINTER_TYPE'];
        
        if ($printType == '' || $SYSCONF['PRINTER_TYPE'] == 'UDP DRAFT' || $SYSCONF['PRINTER_TYPE'] == 'DRAFT')
        {
            $URI = "udp://".$SYSCONF['serverPort'];
        
            $fp = fsockopen($URI, 5003, $errno, $errstr, 10) or die("Can't connect...");

            if (!$fp) 
            {
                echo "$errstr ($errno)<br>\n";
            }
            else
            {	
                @fputs($fp,$pln);
                @fputs($fp,"eof");
                @fclose ($fp);
            }
        }
        elseif ($printType == 'HTTP DRAFT')
        {
                $fp = fsockopen("udp://$dest", 5003, $errno, $errstr, 30) or die("Can't connect");
                if (!$fp) 
                {
                echo "Socket Connection Error $errstr ($errno) after $mtry tries<br>\n";
                }
                else
                {	
                    fwrite($fp,$pln);
                fclose ($fp);
            }
            
        }
        elseif ($printType == 'TCP DRAFT')
        {
            $m = "tcp://$dest";
        
            $mtry=0;	   
            while (true)
            {
                $fp = @fsockopen("tcp://$dest", 5003, $errno, $errstr, 30);
                if ($fp || $mtry>100) 
                {
                    break;
                }
                //echo " Try...";
                $mtry++;
            } 	

            if (!$fp) {
                message1("Unable to connect to Remote Printer... $errstr ($errno) after $mtry tries...<br>");
            }
            else
            {	
                @fputs($fp,$pln);
                    @fclose ($fp);
            //  	echo "<pre>$pln</pre>";
            }
        }
        elseif ($printType=='LINUX LP Printer')
        {
            $m = "tcp://$dest";
            $fp = @fsockopen("tcp://$dest", 5003, $errno, $errstr, 10);
            if (!$fp) {
                message($m."Unable to connect to Nix Printer $errstr ($errno)<br>\n");
            }
            else
            {	
                @fwrite($fp,$pln);
                    @fclose ($fp);
            }
        }
        elseif ($printType=='LINUX LP Printer -- LOCAL')
        {
            $file ="/tmp/".rand();
            $fl = fopen($file,"w+");
            if (!$fl)
            {
                $rmsg="Unable To Open Temporary Printing File...";
            }
            else
            {
                if (fwrite($fl, $pln) === FALSE) 
                {
                    fclose($fl);
                    $rmsg="Unable To Find [ $dest ] Printing Device...";
                }
                else
                {
                    fclose($fl);
                    /*
                    if (!is_null($dest))
                    {
                        system("lp -d $dest $file",$msg);
                        //system("lp -d $dest $file");
                    }
                    else
                    {
                        system("lp $file");
                    }	
                    system("rm $file");
                    */
                }	
                
            }
        }
        elseif ($printType=='GRAPHICS')
        {
            echo "<form name='form1'>";
            echo "<input type='hidden' name='print_area' cols='110' rows='25' readonly value='$pln'>";
            echo "</form>";
            echo "<script>printIframe(form1.print_area)</script>";
        }
        elseif ($printType == 'PHP Printer(DRAFT)')
        {
            $handle = printer_open($dest);
            if (!handle)
            {
                $rmsg="Unable to Open Port...";
                echo "Error Printing...".$dest;
                exit;
            }
            else
            {
                printer_set_option($handle, PRINTER_MODE, raw);
                if (!@printer_write($handle, $pln))
                {
                    $rmsg="Unable to Write To Port...".$handle;
                    //@printer_write($handle, $pln);
                    echo "Error Printing...".$dest;
                    exit;
                }
                else
                {
                    $rmsg = "";
                }
                printer_close($handle);
            }	
        }	
        else //if ($printType == 'PHP Printer(TEXT)') //graphics
        {
            $handle = printer_open($dest);
            if (!handle)
            {
                $rmsg="Unable to Open Port...";
            }
            else
            {
                @printer_set_option($handle, PRINTER_MODE, text);
                if (!@printer_write($handle, $pln))
                {
                    $rmsg="Unable to Write To Port...".$handle;
                    printer_write($handle, $pln);
                }
                else
                {
                    $rmsg = "Printed";
                }
                printer_close($handle);
            }	
        }	

    }
}