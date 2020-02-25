<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.yesnodropdown.php
 * Type:     function
 * Name:     yesnodropdown
 * Purpose:  widget for yesnodropdown
 * -------------------------------------------------------------
 */
function smarty_function_yesnodropdown($params, $content)
{
    $name = $params['name'];
    $selected = isset($params['selected'])? $params['selected'] : "";
    $id = isset($params['id']) ? $params['id'] : $name;
    $style = isset($params['style'])? $params['style'] : "";

    $yes_selected = !in_array(strtolower($selected), ['0', 'f', 'false', '-1']) ? 'selected' : '';
    $no_selected = in_array(strtolower($selected), ['0', 'f', 'false', '-1']) ? 'selected' : '';
    
    $html =<<<HTML
            <select name="{$name}" id={$id} class="bt-dropdown form-control" style="{$style}">
                <option value="M" {$yes_selected}>Yes</option>
                <option value="F" {$no_selected}>No</option>
            </select>
HTML;

    return $html;
}



