<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.adminusergroupdropdown.php
 * Type:     function
 * Name:     adminusergroupdropdown
 * Purpose:  widget for adminusergroupdropdown
 * -------------------------------------------------------------
 */

use App\Helpers\Utils;

function smarty_function_adminusergroupdropdown($params, $content)
{
    $name = isset($params['name']) ? $params['name'] : 'adminusergroup_id';
    $id = isset($params['id']) ? $params['id'] : 'id';
    $selected = isset($params['selected']) ? $params['selected'] : 0;

    $AdminUserGroupModel = new \App\Models\Administration\AdminUserGroupModel();
    $adminusergroups = $AdminUserGroupModel->asObject()->orderBy("LOWER(adminusergroup)", "asc")->findAll();

    $html =<<<HTML
            <select name="{$name}" 
                    id="{$id}"
                    class="bt-dropdown form-control select2-dd" 
                    placeholder="Select User Group" 
                    selected="{$selected}">
HTML;

    if (isset($params['include_all']) && $params['include_all']) {
        $html .= "<option value='0'>All</option>";
    }
    foreach ($adminusergroups AS $adminusergroup)
    {
        $selected_tag = ($adminusergroup->adminusergroup_id == $selected ? 'selected' : '');
        $html .= "<option value='{$adminusergroup->adminusergroup_id}' {$selected_tag}>{$adminusergroup->adminusergroup}</option>";
    }

    $html .= "</select>";

    return $html;
}



