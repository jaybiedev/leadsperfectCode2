<?php namespace App\Controllers;

use App\Models\Common\ContentModel;

class Home extends BaseController
{
	public function index()
	{
		$ContentModel = new ContentModel();
		$Content = $ContentModel->where('content_type', 'HTML')->first();
		$data['content'] = $Content->content;
		return $this->View->render("Common/content.tpl", $data);
	}

	//--------------------------------------------------------------------

}
