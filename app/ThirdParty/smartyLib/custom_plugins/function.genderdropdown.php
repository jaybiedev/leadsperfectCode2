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
    $selected = isset($params['selected'])? $params['selected'] : "";
    $id = isset($params['id']) ? $params['id'] : $name;
    $style = isset($params['style'])? $params['style'] : "";

    $male_selected = $selected == 'M' ? 'selected' : '';
    $female_selected = $selected == 'F' ? 'selected' : '';
    // array('Male'=>'M','Female'=>'F')
    $html =<<<HTML
            <select name="{$name}" id={$id} class="bt-dropdown form-control" style="{$style}">
                <option value="M" {$male_selected}>Male</option>
                <option value="F" {$female_selected}>Female</option>
            </select>
HTML;

    return $html;
}



