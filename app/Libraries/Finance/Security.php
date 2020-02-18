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

    public static function getUserSessionInfo() {
        if (!self::isLogged())
            return null;
        
        return self::getSession()->get("User");
    }

    public static function getSessionUserId() {
  
        $UserSessionInfo = self::getUserSessionInfo();
        if (empty($UserSessionInfo))
            return null;
        return $UserSessionInfo['id'];
    }

    public static function isInUserGroup($usergroup=null)
    {
        if (!self::isLogged())
            return false;
        
        $Session = self::getSession();
        $UserInfo = $Session->get("User");
        
        if (!empty($UserInfo['usergroup']) && in_array($usergroup, $UserInfo['usergroup']))
            return true;
        
        return false;
    }

    public static function isAdmin()
    {
        return self::isInUserGroup('A');
    }

    public static function isLegal()
    {
        return self::isInUserGroup('L');
    }

    public static function isAdminOrLegal() 
    {
        return (self::isInUserGroup('A') || self::isInUserGroup('L'));
    }

    /**
     * helper method for hasPermission() with action='madd'
     * @param string $module 
     * @return bool
     */
    public static function canAdd($module, $can_admin_override=true) {
        return self::hasPermission($module, 'madd', $can_admin_override);
    }

    /**
     * helper method for hasPermission() with action='medit'
     * @param string $module 
     * @return bool
     */
    public static function canEdit($module, $can_admin_override=true) {
        return self::hasPermission($module, 'medit', $can_admin_override);
    }

    /**
     * helper method for hasPermission() with action='medelete'
     * @param string $module 
     * @return bool
     */
    public static function canDelete($module, $can_admin_override=true) {
        return self::hasPermission($module, 'mdelete', $can_admin_override);
    }

    /**
     * helper method for hasPermission() with action='medelete'
     * @param string $module 
     * @return bool
     */
    public static function canView($module, $can_admin_override=true) {
        return self::hasPermission($module, 'mview', $can_admin_override);
    }

    /**
     * @param string $module (eg branch, account)
     * @param string $action (eg madd, medit, mdelete, mview)
     * @param bool $can_admin_override (DEFAULT true - usergroup="A" always allows, false-check permission even usergroup='A')
     * @return bool
     */
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