<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Libraries\Finance\Authenticate;
use App\Models\Administration\SysConfigModel;

class Configuration extends AdministrationBaseController
{
    public function index() 
    {
        $data = [];
        $this->View->setPageTitle("Administration");
        $this->View->setPageHeader('Configuration');

        $SysConfig = new SysConfigModel();
        $data['sysconfigs'] = $SysConfig->asObject()->orderBy('LOWER(description)', 'asc')->findAll();

        return $this->View->render("Administration/Configuration/index.tpl", $data);
    }

    public function post() 
    {
        // save configuration
        $fields = $this->request->getPost('field');
        $SysConfig = new SysConfigModel();
        foreach ((array)$fields as $field=>$value) {
            $Item = $SysConfig->asObject()->where('sysconfig', $field)->first();
            $SysConfig->update($Item->id, ['value'=>$value]);
        }
        
        if ($this->request->isAJAX()) {
            return $this->View->renderJsonSuccess('',[]);
        }
        
        return $this->index();
    }

}
