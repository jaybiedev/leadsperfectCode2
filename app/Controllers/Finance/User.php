<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Models\Finance\UserModel;

class User extends BaseController
{
	public function index()
	{
        $User = new UserModel();
        return $this->View->render("Finance/User/login.tpl");
		//return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
