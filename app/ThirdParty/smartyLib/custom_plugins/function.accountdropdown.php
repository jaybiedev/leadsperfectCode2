<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.accountdropdown.php
 * Type:     function
 * Name:     accountdropdown
 * Purpose:  widget for accountdropdown
 * -------------------------------------------------------------
 */

use App\Helpers\Utils;

function smarty_function_accountdropdown($params, $content)
{
    $name = isset($params['name']) ? $params['name'] : 'account_id';
    $id = isset($params['id']) ? $params['id'] : $name;
    $placeholder = isset($params['placeholder']) ? $params['placeholder'] : 'Search account';
    $selected = isset($params['selected']) ? $params['selected'] : 0;

    $filter = "";
    if (!empty($params['account_group_id'])) {
        $filter .= "data-account-group-id='" . $params['account_group_id'] . "'";
    }

    $html =<<<HTML
            <select name="{$name}" id="{$id}"
                class="bt-dropdown form-control select2-ajax-dd-account" 
                placeholder="{$placeholder}"
                selected="{$selected}"
                data-ajax-url="/finance/account/get"
                data-id="account_id"
                data-text="account"
                {$filter}>
HTML;

    if (isset($params['include_all']) && $params['include_all']) {
        $html .= "<option value=''>All</option>";
    }

    $html .= "</select>";

    return $html;
}



