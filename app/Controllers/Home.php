<?php namespace App\Controllers;

use App\Libraries\Finance\Authenticate as AuthenticateLib;
use App\Models\Common\ContentModel;

class Home extends BaseController
{
	public function index()
	{
		$ContentModel = new ContentModel();
		if (AuthenticateLib::isLogged($this->Session))
		{
			$data = ["items"=>[]];
			$moduleClass = getenv("moduleClass");
			
			if (!empty($moduleClass))
			{
				$data['modules'] = $moduleClass::getModules();
			}

			// $this->redirectTo($this->Session->get("redirectTo"));
			// $Content = $ContentModel->where('identifier', 'HOME')
			// 					->where('content_type', 'HTML')->first()->populate();
			// $data['content'] = $Content->content;
			// return $this->View->render("Common/content.tpl", $data);
			return $this->View->render("Finance/Home/homepage.tpl", $data);
		}
		else
		{
			$loginUrl = getenv('loginUrl');
			$this->redirectTo($loginUrl . "?redirectTo=/");
		}

	}

	public function logout()
    {
        $this->Session->destroy();
        $this->redirectTo("");
    }

}
