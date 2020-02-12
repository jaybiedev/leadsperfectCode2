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

    $Model = new \App\Models\Finance\AccountGroupModel();
    $items = $Model->orderby("LOWER(account_group)", "asc")->findAll();

    $html =<<<HTML
            <select name="{$name}" 
                    class="bt-dropdown form-control select2-dd" 
                    placeholder="Select User Group" ">
HTML;
    if (isset($params['include_all']) && $params['include_all']) {
        $html .= "<option value=''>All</option>";
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



