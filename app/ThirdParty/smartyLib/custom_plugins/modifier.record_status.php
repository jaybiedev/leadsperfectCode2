<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifier
 */
/**
 * Smarty date_format modifier plugin
 * Type:     modifier
 * Name:     record_status
 * Purpose:  format record_status to string
 * Input:
 *          - string: input entry_type
 *

 * @param string $string       input entry_type char
 *
 * @return string |void
 */
function smarty_modifier_record_status($t)
{
    $str='';
    if ($t=='S')
        $str = 'Saved';
    elseif ($t=='P')
        $str = 'Printed';
    elseif ($t=='C')
        $str = 'Cancelled';
    elseif ($t=='V')
        $str = 'Voided';
    elseif ($t=='R')
        $str = 'Returned';
    elseif ($t=='N' or $t=='')
        $str = 'New';
    elseif ($t=='M')
        $str = 'Modified';
    elseif ($t=='T')
        $str = 'Posted';
    elseif ($t=='U')
        $str = 'UnPosted';
    elseif ($t=='A')
        $str = 'Active';
    elseif ($t=='I')
        $str = 'In-Active';
    elseif ($t=='L')
        $str = 'Legal';
    elseif ($t=='O')
        $str = 'Closed';
    return $str;
}
