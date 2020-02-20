<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\AccountGroupModel;

class AccountGroup extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Account Groups');
        $this->View->setModalTitle('Edit AccountGroup');
        return $this->View->render('Finance/AccountGroup/index.tpl');
    }
    
    public function get()
    {
        $id = $this->request->getGet('id', FILTER_VALIDATE_INT);
		$includeDeleted = Utils::getBoolean($this->request->getGet('includeDeleted'));

        $AccountGroupModel = new AccountGroupModel();   
        $data = [];

        if (!empty($id))
        {
            if ($includeDeleted) {
				$AccountGroupModel->withDeleted();
			}
            $data = $AccountGroupModel->find((int)$id)->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $AccountGroupModel = new AccountGroupModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $AccountGroupModel, 'account_group');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $AccountGroupModel->like($DataTable->getSearchableLike())
                                ->join("account_class", "account_class.account_class_id=account_group.account_class_id", "left")
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $AccountGroupModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->join("account_class", "account_class.account_class_id=account_group.account_class_id",  "left")
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $AccountGroupModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }
}
