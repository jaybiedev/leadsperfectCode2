<?php namespace App\Libraries\Finance;

use \App\Models\Finance\AdminBranchModel;

class User 
{
    public static function getAdminRights($User)
    {
        return [];
    }

    public static function getBranches($User)
    {
        if (empty($User) || empty($User->admin_id))
        {
            return [];
        }

        $AdminBranchModel = new AdminBranchModel();
        $branches = $AdminBranchModel->where(["admin_id"=>$User->admin_id])->findAll();

        return $branches;
    }
}