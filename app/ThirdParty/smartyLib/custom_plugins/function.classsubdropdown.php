<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.classubdropdown.php
 * Type:     function
 * Name:     classubdropdown
 * Purpose:  widget for classubdropdown
 * -------------------------------------------------------------
 */
function smarty_function_classsubdropdown($params, $content)
{
    $name = $params['name'];
    $selected = $params['selected'];
    $add_class = $params['class'];
    $style = $params['style'];

    $sd_selected = $selected == 'SD' ? 'selected' : '';
    $ec_selected = $selected == 'EC' ? 'selected' : '';
    $se_selected = $selected == 'SE' ? 'selected' : '';

   // array('Single'=>'S','Married'=>'M','Widow'=>'W') 
    $html =<<<HTML
            <select name="{$name}" class="bt-dropdown form-control {$add_class}" style="{$style}">
                    <option value=""></option>
                    <option value="SD" {$sd_selected}>SD</option>
                    <option value="EC" {$ec_selected}>EC</option>
                    <option value="SE" {$se_selected}>SD & EC</option>
            </select>
HTML;

    return $html;
}



