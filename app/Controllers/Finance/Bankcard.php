<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\BankcardModel;

class Bankcard extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Partners');
        $this->View->setModalTitle('Edit Partner');
        return $this->View->render('Finance/Bankcard/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $BankcardModel = new BankcardModel();   
        $data = [];

        if (!empty($meta['bankcard_id']))
        {
            $data = $BankcardModel->find((int)$meta['bankcard_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $BankcardModel = new BankcardModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $BankcardModel, 'bankcard');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $BankcardModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $BankcardModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $BankcardModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $AccountClass_id = $this->request->getPost('bankcard_id');
        $BankcardModel = new BankcardModel();
        
        $Bankcard = $BankcardModel->first($bankcard_id);
        if (!empty($id) && empty($Bankcard->bankcard_id))
        {
            return $this->View->renderJsonFail();
        }

        $Bankcard = new \App\Entities\Finance\Bankcard();

        $meta = $this->request->getPost();
        $Bankcard->fill($meta);
        $BankcardModel->save($Bankcard);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $BankcardModel = new BankcardModel();
            $Bankcard = $BankcardModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Bankcard = new \App\Entities\Finance\Bankcard();
            $Bankcard->date_deleted = null;
            $BankcardModel = new BankcardModel();
            $Bankcard = $BankcardModel->save($Bankcard);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
