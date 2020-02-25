<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.accountgroupdropdown.php
 * Type:     function
 * Name:     accountgroupdropdown
 * Purpose:  widget for accountgroupdropdown
 * -------------------------------------------------------------
 */

use App\Helpers\Utils;

function smarty_function_accountgroupdropdown($params, $content)
{
    $name = isset($params['name']) ? $params['name'] : 'account_group_id';
    $id = isset($params['id']) ? $params['id'] : 'account_group_id';
    $selected = isset($params['selected']) ? $params['selected'] : 0;
    $placeholder = isset($params['placeholder']) ? $params['placeholder'] : 'Search account group';

    $Model = new \App\Models\Finance\AccountgroupModel();
    $items = $Model->orderby("LOWER(account_group)", "asc")->findAll();

    $html =<<<HTML
            <select name="{$name}" 
                    id="{$id}"
                    class="bt-dropdown form-control select2-dd" 
                    placeholder="{$placeholder}">
HTML;
    if (isset($params['include_all']) && Utils::getBoolean($params['include_all'])) {
        $html .= "<option value='0'>All</option>";
    }

    foreach ($items AS $item)
    {
        $item->populate();
        $selected_tag = ($item->account_group_id == $selected ? 'selected' : '');
        $html .= "<option value='{$item->account_group_id}' {$selected_tag}>{$item->account_group}</option>";
    }

    $html .= "</select>";

    return $html;
}



