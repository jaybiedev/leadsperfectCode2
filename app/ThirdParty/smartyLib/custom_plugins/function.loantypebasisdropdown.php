<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.loantypebasisdropdown.php
 * Type:     function
 * Name:     loantypebasisdropdown
 * Purpose:  widget for loantypebasisdropdown
 * -------------------------------------------------------------
 */
function smarty_function_loantypebasisdropdown($params, $content)
{
    $name = $params['name'];
    $selected = isset($params['selected'])? $params['selected'] : "";
    $id = isset($params['id']) ? $params['id'] : $name;
    $ngmodel = isset($params['ng-model']) ? "ng-model=\"{$params['ng-model']}\"" : '';
    $style = isset($params['style'])? $params['style'] : "";

    $a_selected = $selected == 'A' ? 'selected' : '';
    $m_selected = $selected == 'M' ? 'selected' : '';
    $i_selected = $selected == 'I' ? 'selected' : '';
    
    $html =<<<HTML
            <select name="{$name}" id={$id} class="form-control select2-dd" {$ngmodel} style="{$style}">
                <option value="A" {$a_selected}>Annual</option>
                <option value="M" {$m_selected}>Monthly</option>
                <option value="I" {$i_selected}>Interest Only</option>
            </select>
HTML;

    return $html;
}



