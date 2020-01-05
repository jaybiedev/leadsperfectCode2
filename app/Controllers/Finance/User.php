<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Models\Finance\UserModel;

class User extends FinanceBaseController
{
	public function index()
	{
        $User = new UserModel();
        return $this->View->render("Finance/User/profile.tpl");
		//return view('welcome_message');
	}


}
