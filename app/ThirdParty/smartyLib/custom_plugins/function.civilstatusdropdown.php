<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.genderdropdown.php
 * Type:     function
 * Name:     sitedropdown
 * Purpose:  widget for sitedropdown
 * -------------------------------------------------------------
 */
function smarty_function_civilstatusdropdown($params, $content)
{
    $name = $params['name'];
    $selected = $params['selected'];

    $single_selected = $selected == 'S' ? 'selected' : '';
    $married_selected = $selected == 'M' ? 'selected' : '';
    $widow_selected = $selected == 'W' ? 'selected' : '';

   // array('Single'=>'S','Married'=>'M','Widow'=>'W') 
    $html =<<<HTML
            <select name="{$name}" class="bt-dropdown form-control">
                    <option value="S" {$single_selected}>Single</option>
                    <option value="M" {$married_selected}>Married</option>
                    <option value="W" {$widow_selected}>Widow</option>
            </select>
HTML;

    return $html;
}



