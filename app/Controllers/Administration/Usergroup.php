<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Administration\UserGroupModel;

class Usergroup extends BaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage User Groups');
        $this->View->setModalTitle('Edit UserGroup');
        return $this->View->render('Administration/UserGroup/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $UserGroupModel = new UserGroupModel();   
        $data = [];

        if (!empty($meta['adminusergroup_id']))
        {
            $data = $UserGroupModel->find((int)$meta['adminusergroup_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $UserGroupModel = new UserGroupModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $UserGroupModel, 'adminusergroup');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $UserGroupModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $UserGroupModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $UserGroupModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $adminusergroup_id = $this->request->getPost('adminusergroup_id');
        $UserGroupModel = new UserGroupModel();
        
        $UserGroup = $UserGroupModel->first($adminusergroup_id);
        if (!empty($id) && empty($UserGroup->adminusergroup_id))
        {
            return $this->View->renderJsonFail();
        }

        $UserGroup = new \App\Entities\Finance\UserGroup();

        $meta = $this->request->getPost();
        $UserGroup->fill($meta);
        $UserGroupModel->save($UserGroup);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $UserGroupModel = new UserGroupModel();
            $UserGroup = $UserGroupModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $UserGroup = new \App\Entities\Finance\UserGroup();
            $UserGroup->date_deleted = null;
            $UserGroupModel = new UserGroupModel();
            $UserGroup = $UserGroupModel->save($UserGroup);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
