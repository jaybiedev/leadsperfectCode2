<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.accountclassificationdropdown.php
 * Type:     function
 * Name:     accountclassificationdropdown
 * Purpose:  widget for accountclassificationdropdown
 * -------------------------------------------------------------
 */

use App\Helpers\Utils;

function smarty_function_accountclassificationdropdown($params, $content)
{
    $name = isset($params['name']) ? $params['name'] : 'account_class_id';
    $id = isset($params['id']) ? $params['id'] : 'account_class_id';
    $selected = isset($params['selected']) ? $params['selected'] : 0;

    $Model = new \App\Models\Finance\AccountclassModel();
    $items = $Model->findAll();

    $html =<<<HTML
            <select name="{$name}" class="bt-dropdown form-control">
HTML;
    if (isset($params['include_all']) && $params['include_all']) {
        $html .= "<option value=''>All</option>";
    }

    foreach ($items AS $item)
    {
        $item->populate();
        $selected_tag = ($item->account_class_id == $selected ? 'selected' : '');
        $html .= "<option value='{$item->account_class_id}' {$selected_tag}>{$item->account_class}</option>";
    }

    $html .= "</select>";

    return $html;
}



