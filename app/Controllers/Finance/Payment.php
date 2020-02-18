<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Entities\Finance\PaymentDetail;
use App\Entities\Finance\PaymentHeader;
use App\Helpers\Utils;
use App\Models\Finance\BankModel;
use App\Libraries\Finance\Report\FactoryReport;
use App\Libraries\Finance\Security;
use App\Models\Finance\LedgerModel;
use App\Models\Finance\PaymentDetailModel;
use App\Models\Finance\PaymentHeaderModel;
use App\Models\Finance\ReleasingModel;

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
        $recordsTotal = 0;

        if (!empty((int)$meta['payment_header_id'])) {

            $payment_header_id =  (int)$meta['payment_header_id'];
            
            if (!empty($DataTable->searchValue)) {
                // sql statement for now
                $ilike = $DataTable->getSearchableLike(['withdrawn', 'amount', 'excess']);
                $ilike_sql = Utils::arrayKeyValueImplode(" OR ", $ilike, 'ilike');

                $sql = "SELECT pd.*,
                                account.account
                            FROM payment_detail AS pd 
                            LEFT JOIN account ON account.account_id=pd.account_id
                            WHERE
                                pd.payment_header_id={$payment_header_id}
                                AND ($ilike_sql)
                        ";
                 
                $data = $Model->db->query($sql)->getResultArray();
                $recordsTotal = $Model->countResults($sql);
            }
            else {
                $data = $Model->orderBy('payment_detail_id', 'desc')
                                    ->asArray()
                                    ->join("account", "account.account_id=payment_detail.account_id")
                                    ->where('payment_header_id', $payment_header_id)
                                    ->findAll($DataTable->limit, $DataTable->offset);
                $recordsTotal = $Model->countResults();
            }
        }
        
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
        $data = [];
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

        $this->db->transStart();
        try {

            $UserInfo = Security::getUserSessionInfo();

            $PaymentHeader = new \App\Entities\Finance\PaymentHeader();
            $PaymentHeader->fill($header);
            $PaymentHeader->UserInfo['id'];

            $PaymentDetail = new \App\Entities\Finance\PaymentDetail();
            $PaymentDetail->fill($detail);

            \App\Libraries\Finance\Logic\Payment::PostPayment($PaymentHeader, $PaymentDetail, $UserInfo);
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
