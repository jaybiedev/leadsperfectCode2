<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.radiocheckselected.php
 * Type:     function
 * Name:     radiocheckselected
 * Purpose:  widget for radiocheckselected
 * -------------------------------------------------------------
 */
function smarty_function_radiocheckselected($params, $content)
{
    $selected = $params['selected'];
    $value = $params['value'];

    if ($selected != $value)
        return null;

    return "checked='checked'";
}



