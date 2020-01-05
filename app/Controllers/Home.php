<?php namespace App\Controllers;

use App\Libraries\Finance\Authenticate as AuthenticateLib;
use App\Models\Common\ContentModel;

class Home extends BaseController
{
	public function index()
	{
		if (AuthenticateLib::isLogged($this->Session))
		{
			$this->redirectTo($this->Session->get("redirectTo"));
		}

		$ContentModel = new ContentModel();
		$Content = $ContentModel->where('content_type', 'HTML')->first()->populate();
		$data['content'] = $Content->content;

		return $this->View->render("Common/content.tpl", $data);
	}

	public function logout()
    {
        $this->Session->destroy();
        $this->redirectTo("");
    }

}
