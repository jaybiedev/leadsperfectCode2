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
}