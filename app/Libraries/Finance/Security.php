<?php namespace App\Libraries\Finance;

use App\Models\Finance\UserModel;
use CodeIgniter\Session\Session;
use App\Libraries\Finance\Authenticate as AuthenticateLib;

class Security 
{
    public static function getSession()
    {
        return \Config\Services::session();
    }

    public static function isLogged()
    {  
        return AuthenticateLib::isLogged(self::getSession());

    }

    public static function isAdmin()
    {
        if (!self::isLogged())
            return false;
        
        $Session = self::getSession();
        $UserInfo = $Session->get("User");
        
        if (!empty($UserInfo['usergroup']) && in_array("A", $UserInfo['usergroup']))
            return true;
        
        return false;
    }

    public static function canAdd($module, $can_admin_override=true) {
        return self::hasPermission($module, 'madd', $can_admin_override);
    }

    public static function canEdit($module, $can_admin_override=true) {
        return self::hasPermission($module, 'medit', $can_admin_override);
    }

    public static function canDelete($module, $can_admin_override=true) {
        return self::hasPermission($module, 'mdelete', $can_admin_override);
    }

    public static function canView($module, $can_admin_override=true) {
        return self::hasPermission($module, 'mview', $can_admin_override);
    }

    public static function hasPermission($module, $action, $can_admin_override=true) {

        $Session = self::getSession();
        if (empty($Session))
            return false;
        
        $UserInfo = $Session->get("User");
        if (empty($UserInfo))
            return false;

        if ($can_admin_override && self::isAdmin())
            return true;

        if (empty($UserInfo[$module]))
            return false;
        
        $AdminRights = $UserInfo[$module];
        
        $user_id = $UserInfo['id'];
        $validate_string = null;
        if ($action=="madd") 
            $validate_string=md5("Y".$user_id."100".$module);
        elseif ($action=="medit") 
            $validate_string=md5("Y".$user_id."250".$module);
        elseif ($action=="mdelete") 
            $validate_string=md5("Y".$user_id."400".$module);
        elseif ($action=="mview") 
            $validate_string=md5("Y".$user_id."550".$module);

        return ($AdminRights->$action == $validate_string);
    }
}