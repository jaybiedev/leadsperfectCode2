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
function smarty_function_genderdropdown($params, $content)
{
    $name = $params['name'];
    $selected = $params['selected'];

    $male_selected = $selected == 'M' ? 'selected' : '';
    $female_selected = $selected == 'F' ? 'selected' : '';
    // array('Male'=>'M','Female'=>'F')
    $html =<<<HTML
            <select name="gender" class="bt-dropdown form-control">
                <option value="M" {$male_selected}>Male</option>
                <option value="F" {$female_selected}>Female</option>
            </select>
HTML;

    return $html;
}



