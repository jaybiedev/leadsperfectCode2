<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\BankModel;
use App\Libraries\Finance\Report\FactoryReport;

class Payment extends FinanceBaseController
{
	public function index()
	{
        $data = ["Query"=>null];
        $date = $this->request->getGet('date');

        if (empty($date)) {
            $date = Utils::getDate();
        }

        $data['date'] = $date;

        // hacking away
        $mdate = Utils::getDate($date, 'Y-m-d');
        $sql = "select ph.*, 
                admin.name AS adminname,
                clientbank.clientbank,
                account_group.account_group
            FROM 
                payment_header AS ph
                LEFT JOIN admin on admin.admin_id=ph.admin_id
                LEFT JOIN clientbank ON clientbank.clientbank_id=ph.clientbank_id
                LEFT JOIN account_group ON account_group.account_group_id=ph.account_group_id
            WHERE  
                (ph.date='$mdate' OR ph.date_withdrawn='$mdate') 
                AND NOT ph.mcheck in ('G','T')";

        $data['Query'] = $this->db->query($sql);

        $this->View->setPageHeader('Browse Payments');
        return $this->View->render('Finance/Payment/index.tpl', $data);
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $BankModel = new BankModel();   
        $data = [];

        if (!empty($meta['bank_id']))
        {
            $data = $BankModel->find((int)$meta['bank_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $BankModel = new BankModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $BankModel, 'bank');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $BankModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $BankModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $BankModel->countAllResults();


        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function entry() {
        $data = ["date"=>date('m/d/Y'), "account_group_id"=>null];
        $payment_id = $this->request->uri->getSegment(4);
        $this->View->setPageHeader('Payment/Collection Entry');
        $this->View->setModalTitle("Payment Detail");

        return $this->View->render('Finance/Payment/entry.tpl', $data);
    }

    public function post()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function restore()
    {
        //
    }

}
