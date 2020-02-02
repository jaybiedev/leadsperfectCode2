<?php namespace App\Libraries\Finance;

use \App\Models\Finance\AdminBranchModel;
use App\Models\Finance\AdminRightsModel;

class User 
{
    /**
     * helper to retreive all admingrights permissions records
     * @return array keyed by module
     */
    public static function getAdminRights($User)
    {
        if (empty($User) || empty($User->admin_id)) {
            return [];
        }

        $adminrightsKeyed = [];
        $AdminRightsModel = new AdminRightsModel();
        $adminrights = $AdminRightsModel->where(["admin_id"=>$User->admin_id])->findAll();

        foreach ($adminrights as $item) {
            $item->populate();
            if (empty($item->module))
                continue;
            $adminrightsKeyed[$item->module] = $item;
        }
        unset($adminrights);

        return $adminrightsKeyed;
    }

    /**
     * retrieves all the branches this user is allowed
     * @return array
     */
    public static function getBranches($User)
    {
        if (empty($User) || empty($User->admin_id)) {
            return [];
        }

        $AdminBranchModel = new AdminBranchModel();
        $branches = $AdminBranchModel->where(["admin_id"=>$User->admin_id])->findAll();

        return $branches;
    }
}