<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Entities\Finance\PaymentDetail;
use App\Entities\Finance\PaymentHeader;
use App\Helpers\Utils;
use App\Models\Finance\BankModel;
use App\Libraries\Finance\Report\FactoryReport;
use App\Models\Finance\PaymentDetailModel;
use App\Models\Finance\PaymentHeaderModel;

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
        $data['payment_header_id'] = 

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
    
    public function getDetail()
    {
        $payment_detail_id = (int)$this->request->getGet('payment_detail_id');

        $Model = new PaymentDetailModel();   
        $data = ['PaymentDetail'=>new PaymentDetail()];

        if (!empty($payment_detail_id))
        {
            $data['PaymentDetail'] = $Model->find((int)$payment_detail_id)->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDetailsDataTable()
    {
        $meta = $this->request->getGet();

        $Model = new PaymentDetailModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $Model, 'payment_detail');
    
        $data = [];

        if (!empty((int)$meta['payment_header_id'])) {

            $payment_header_id =  (int)$meta['payment_header_id'];
            
            if (!empty($DataTable->searchValue)) {
                $data = $Model->ilike($DataTable->getSearchableLike(['withdrawn', 'amount', 'excess']))
                                    ->asArray()
                                    ->join("account", "account.account_id=payment_detail.account_id")
                                    ->where('payment_header_id', $payment_header_id)
                                    ->orderBy('payment_detail_id', 'desc')
                                    ->findAll($DataTable->limit, $DataTable->offset);
            }
            else {
                $data = $Model->orderBy('payment_detail_id', 'desc')
                                    ->asArray()
                                    ->join("account", "account.account_id=payment_detail.account_id")
                                    ->where('payment_header_id', $payment_header_id)
                                    ->findAll($DataTable->limit, $DataTable->offset);
            }
        }

        $recordsTotal = $Model->countResults();


        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function entry() {
        $payment_header_id = $this->request->uri->getSegment(4);
      
        $data = [];
        $PaymentHeaderModel = new PaymentHeaderModel();
        if (!empty((int)$payment_header_id)) {
            $PaymentHeader = $PaymentHeaderModel->find($payment_header_id)->populate();
        }
        else {
            $PaymentHeader = new PaymentHeader();
            $PaymentHeader->date = Utils::getDate();
        }

        $data['PaymentHeader'] = $PaymentHeader;
        $data['PaymentDetail'] = new PaymentDetail();

        $this->View->setPageHeader('Payment/Collection Entry');
        $this->View->setModalTitle("Payment Detail");

        return $this->View->render('Finance/Payment/entry.tpl', $data);
    }


    /**
     * Save payment entry
     * Create/Update payment header 
     * Create/Update payment detail
     */
    public function post()
    {
        $header = $this->request->getPostGet('header');
        $detail = $this->request->getPostGet('detail');

        if (empty($header['account_group_id'])) {
            return $this->View->renderJsonFail('No account group selected.');
        }

        if (empty($detail['account_id'])) {
            return $this->View->renderJsonFail('No account specified.');
        }
        
        if (isset($header['payment_header_id']) && (int)$header['payment_header_id'] == 0) {
            unset($header['payment_header_id']);
        }
        if (isset($detail['payment_detail_id']) && (int)$detail['payment_detail_id'] == 0) {
            unset($detail['payment_detail_id']);
        }

        $header['total_amount'] = Utils::getRawNumber($header['total_amount']);
        $header['date'] = Utils::getDate($header['date'], 'Y-m-d');
        $detail['ddate'] = Utils::getDate($detail['ddate'], 'Y-m-d');        

        $detail['withdrawn'] = Utils::getRawNumber($detail['withdrawn']);
        if ($detail['amountdistribution'] == 1) {
            $detail['ammort'] = $detail['withdrawn'];
        }
        elseif ($detail['amountdistribution'] == 2) {
            $detail['excess'] = $detail['withdrawn'];
        }
        else {
            // auto distribute amounts
        }

        $this->db->transStart();
        try {
            $PaymentHeaderModel = new PaymentHeaderModel();
            $PaymentDetailModel = new PaymentDetailModel();
            $PaymentHeaderModel->save($header);

            if (empty($header['payment_header_id'])) {
                $header['payment_header_id'] = $PaymentHeaderModel->getInsertID();
            }
            $detail['payment_header_id'] = $header['payment_header_id'];
    
            $PaymentDetailModel->save($detail);
            if (empty($detail['payment_detail_id'])) {
                $detail['payment_detail_id'] = $PaymentDetailModel->getInsertID();
            }

            $data['detail'] = $detail;
            $data['header'] = $header;
        }
        catch (\Exception $e) {
            return $this->View->renderJsonFail($e->getMessage(), $data);
        }
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE)
        {
            return $this->View->renderJsonFail('Error saving data...', $data);
        }


        return $this->View->renderJsonSuccess('', $data);
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
