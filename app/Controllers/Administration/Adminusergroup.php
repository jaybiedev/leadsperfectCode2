<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Administration\AdminUserGroupModel;

class Adminusergroup extends BaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage User Groups');
        $this->View->setModalTitle('Edit UserGroup');
        return $this->View->render('Administration/AdminUserGroup/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $AdminUserGroupModel = new AdminUserGroupModel();   
        $data = [];

        if (!empty($meta['adminusergroup_id']))
        {
            $data = $AdminUserGroupModel->find((int)$meta['adminusergroup_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AdminUserGroupModel = new AdminUserGroupModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AdminUserGroupModel, 'adminusergroup');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AdminUserGroupModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AdminUserGroupModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AdminUserGroupModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $adminusergroup_id = $this->request->getPost('adminusergroup_id');
        $AdminUserGroupModel = new AdminUserGroupModel();
        
        $AdminUserGroup = $AdminUserGroupModel->first($adminusergroup_id);
        if (!empty($id) && empty($AdminUserGroup->adminusergroup_id))
        {
            return $this->View->renderJsonFail();
        }

        $AdminUserGroup = new AdminUserGroup();

        $meta = $this->request->getPost();
        $AdminUserGroup->fill($meta);
        $AdminUserGroupModel->save($AdminUserGroup);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AdminUserGroupModel = new AdminUserGroupModel();
            $AdminUserGroup = $AdminUserGroupModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AdminUserGroup = new AdminUserGroup();
            $AdminUserGroup->date_deleted = null;
            $AdminUserGroupModel = new AdminUserGroupModel();
            $AdminUserGroup = $AdminUserGroupModel->save($AdminUserGroup);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
