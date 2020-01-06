<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\ClientBankModel;

class ClientBank extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Client Banks');
        $this->View->setModalTitle('Edit Client Bank');
        return $this->View->render('Finance/ClientBank/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $ClientBankModel = new ClientBankModel();   
        $data = [];

        if (!empty($meta['clientbank_id']))
        {
            $data = $ClientBankModel->find((int)$meta['clientbank_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $ClientBankModel = new ClientBankModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $ClientBankModel, 'clientbank');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $ClientBankModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $ClientBankModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $ClientBankModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $clientbank_id = $this->request->getPost('clientbank_id');
        $ClientBankModel = new ClientBankModel();
        
        $ClientBank = $ClientBankModel->first($clientbank_id);
        if (!empty($id) && empty($ClientBank->clientbank_id))
        {
            return $this->View->renderJsonFail();
        }

        $ClientBank = new \App\Entities\Finance\ClientBank();

        $meta = $this->request->getPost();
        $ClientBank->fill($meta);
        $ClientBankModel->save($ClientBank);

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $ClientBankModel = new ClientBankModel();
            $ClientBank = $ClientBankModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $ClientBank = new \App\Entities\Finance\ClientBank();
            $ClientBank->date_deleted = null;
            $ClientBankModel = new ClientBankModel();
            $ClientBank = $ClientBankModel->save($ClientBank);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
