<?php namespace App\Libraries\Finance;

use App\Models\Finance\UserModel;

class Authenticate 
{
        
    public static function login($username, $password)
    {
        $mpassword = md5($password);

        $UserModel = new UserModel();

        $User = $UserModel->where([
            'mpassword'  => $mpassword,
            'username' => $username
        ])->first();

        if (empty($User))
            return false;

        $User->populate();

        // $this->insertUserlog($User);  
        return $User;
    }

    public static function registerUserSession($Session, $User)
    {
        $UserInfo = ["id"=>$User->admin_id, "username" => $User->username, "name" => $User->name];

        $Session->set("User", $UserInfo);
        return true;
    }

    public static function isLogged($Session)
    {
        $UserSessionInfo = $Session->get("User");
        return (!empty($UserSessionInfo) && !empty((int)$UserSessionInfo["id"]));
    }

}