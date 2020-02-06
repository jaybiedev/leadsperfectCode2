<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Common\MenuModel;

class Menu extends BaseController
{
	public function index()
	{   
        $data = ['menu'=>[]];
        $this->View->setPageHeader('Manage Menu Permissions');

        $MenuModel = new MenuModel();
        $data['menu'] = $MenuModel->getMenuTree('Top', '{1}');
        unset($data['menu']['Accounting']);

        return $this->View->render('Administration/Menu/index.tpl', $data);
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $MenuModel = new MenuModel();   
        $data = [];

        if (!empty($meta['id']))
        {
            $data = $MenuModel->find((int)$meta['id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

}
