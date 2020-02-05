<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Administration\AdminModel;

/**
 * Admin is the user module for JGM
 */
class Admin extends BaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Users');
        $this->View->setModalTitle('Edit User');
        return $this->View->render('Administration/Admin/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $AdminModel = new AdminModel();   
        $data = [];

        if (!empty($meta['admin_id']))
        {
            $data = $AdminModel->find((int)$meta['admin_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AdminModel = new AdminModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AdminModel, 'name');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AdminModel->ilike($DataTable->getSearchableLike())
                                ->join('adminusergroup', 'adminusergroup.adminusergroup_id=admin.adminusergroup_id')
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AdminModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->join('adminusergroup', 'adminusergroup.adminusergroup_id=admin.adminusergroup_id')
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AdminModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $adminAdmin_id = $this->request->getPost('admin_id');
        $AdminModel = new AdminModel();
        
        $Admin = $AdminModel->first($admin_id);
        if (!empty($id) && empty($Admin->admin_id))
        {
            return $this->View->renderJsonFail();
        }

        $Admin = new Admin();

        $meta = $this->request->getPost();
        $Admin->fill($meta);
        $AdminModel->save($Admin);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $AdminModel = new AdminModel();
            $Admin = $AdminModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Admin = new \App\Entities\Administration\Admin();
            $Admin->date_deleted = null;
            $AdminModel = new AdminModel();
            $Admin = $AdminModel->save($Admin);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
