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
    $name = isset($params['name']) ? $params['name'] : 'branch_id';
    $selected = isset($params['selected']) ? $params['selected'] : 0;

    $html =<<<HTML
            <select name="{$name}" class="bt-dropdown form-control select2-ajax-dd">
HTML;

    if (isset($params['include_all']) && $params['include_all']) {
        $html .= "<option value=''>All</option>";
    }

    $html .= "</select>";

    return $html;
}



