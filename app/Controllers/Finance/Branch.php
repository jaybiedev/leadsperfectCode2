<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\BranchModel;

class Branch extends FinanceBaseController
{
	public function index()
	{
        /*
        $BranchModel = new BranchModel();          
        $data = $BranchModel->find(null);
        */
        
        $this->View->setPageHeader('Manage Branches');
        $this->View->setModalTitle('Edit Branch');
        return $this->View->render('Finance/Branch/index.tpl');
        // return view('Branch/index.php');
    }
}
