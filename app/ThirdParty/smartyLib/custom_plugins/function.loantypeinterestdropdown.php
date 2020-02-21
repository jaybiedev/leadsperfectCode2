<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.loantypeinterestdropdown.php
 * Type:     function
 * Name:     loantypeinterestdropdown
 * Purpose:  widget for loantypeinterestdropdown
 * -------------------------------------------------------------
 */
function smarty_function_loantypeinterestdropdown($params, $content)
{
    $name = $params['name'];
    $selected = isset($params['selected'])? $params['selected'] : "";
    $id = isset($params['id']) ? $params['id'] : $name;
    $ngmodel = isset($params['ng-model']) ? "ng-model=\"{$params['ng-model']}\"" : '';
    $style = isset($params['style'])? $params['style'] : "";

    $a_selected = $selected == 'A' ? 'selected' : '';
    $d_selected = $selected == 'D' ? 'selected' : '';
    $f_selected = $selected == 'F' ? 'selected' : '';
    
    $html =<<<HTML
            <select name="{$name}" id={$id} class="form-control select2-dd" {$ngmodel} style="{$style}">
                <option value="A" {$a_selected}>Add On</option>
                <option value="D" {$d_selected}>Discounted</option>
                <option value="F" {$f_selected}>Fixed</option>
            </select>
HTML;

    return $html;
}



