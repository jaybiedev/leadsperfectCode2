<?php namespace App\Controllers\Common;
use App\Controllers\BaseController;
use App\Libraries\Finance\Authenticate;
use App\Models\Common\SysConfigModel;

class Administration extends BaseController
{

    public function index()
    {
        $data = [];

        $this->View->setPageTitle("Administration");
        return $this->View->render("Common/Administration/index.tpl", $data);
    }

    public function configuration() 
    {
        if ($this->isPost()) {
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
        }

        $data = [];
        $this->View->setPageTitle("Administration");
        $this->View->setPageHeader('Configuration');

        $SysConfig = new \App\Models\Common\SysConfigModel();
        $data['sysconfigs'] = $SysConfig->asObject()->orderBy('LOWER(description)', 'asc')->findAll();

        return $this->View->render("Common/Administration/configuration.tpl", $data);
    }
}
