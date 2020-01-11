<?php namespace App\Libraries\Finance;

use App\Helpers\Utils;
use App\Models\Common\MenuModel;
use App\Models\Finance\UserModel;

class Module 
{
    public static function getModules($user_id=0)
    {
        $MenuModel = new MenuModel();
        $menus = $MenuModel->getMenuTree("Top", "{1,1}", "sort_order");
       
        return $menus;
    }
}