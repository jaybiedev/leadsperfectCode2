<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Libraries\Finance\Authenticate as AuthenticateLib;
use App\Libraries\Finance\Security;

class Authenticate extends FinanceBaseController
{
	public function index()
	{
        if ($this->isPost())
        {
            $encrpted = $this->request->getPost('encrypted');

            if ($encrpted !== false) 
            {
                $username = base64_decode($this->request->getPost('username'));
                $passowrd = base64_decode($this->request->getPost('password'));
            }
            else
            {
                $username = $this->request->getPost('username');
                $passowrd = $this->request->getPost('password');
            }

            if (false == $User = AuthenticateLib::login($username, $passowrd))
            {
                $this->Session->destroy();
                return $this->View->renderJsonFail();
                exit;
            }

            AuthenticateLib::registerUserSession($this->Session, $User);

            $redirectTo = $this->request->getPost("redirectTo");
            if (empty($redirectTo)) 
                $redirectTo = "finance";

            $this->Session->set("redirectTo", $redirectTo);

            $data = ["User" => ["id"=>$User->admin_id, 
                "username" => $User->username, 
                "name" => $User->name], 
                "isAdmin" => Security::isAdmin(),
                "redirectTo" => base_url() . "/" . $redirectTo];

            return $this->View->renderJsonSuccess("authenticated", $data);
        }

        return $this->View->render("Finance/Authenticate/index.tpl");
    }
    
    public function logout()
    {
        $this->Session->destroy();
        $this->redirectTo("finance/authenticate");
    }
}
