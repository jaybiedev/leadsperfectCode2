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

use App\Helpers\Utils;

function smarty_function_branchdropdown($params, $content)
{
    $name = isset($params['name']) ? $params['name'] : 'branch_id';
    $selected = isset($params['selected']) ? $params['selected'] : 0;
    $user_id = isset($params['user_id']) ? $params['user_id'] : 0;
    $is_ignore_session = isset($params['is_ignore_session']) ? (bool)$params['is_ignore_session'] : false;

    $BranchModel = new \App\Models\Finance\BranchModel();
    $branches = $BranchModel->getBranches($user_id, $is_ignore_session);

    $html =<<<HTML
            <select name="{$name}" class="bt-dropdown form-control">
HTML;

    foreach ($branches AS $branch)
    {
        $branch->populate();
        $selected_tag = ($branch->branch_id == $selected ? 'selected' : '');
        $html .= "<option value='{$branch->branch_id}' {$selected_tag}>{$branch->branch}</option>";
    }

    $html .= "</select>";

    return $html;
}



