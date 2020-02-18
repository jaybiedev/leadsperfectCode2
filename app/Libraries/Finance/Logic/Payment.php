<?php namespace App\Libraries\Finance\Logic;


use App\Entities\Finance\PaymentHeader;
use App\Entities\Finance\PaymentDetail;
use App\Entities\Finance\Ledger;
use App\Models\Finance\ReleasingModel;
use App\Models\Finance\LedgerModel;
use App\Models\Finance\PaymentHeaderModel;
use App\Models\Finance\PaymentDetailModel;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;

class Payment {

    public $PaymentHeader;
    public $PaymentDetails = [];

    public  function __construct(PaymentHeader  $PaymentHeader=null) {
        if ($PaymentHeader instanceof PaymentHeader) {
            $this->PaymentHeader = $PaymentHeader;
        }
    }

    public function AddPaymentDetail(PaymentDetail $PaymentDetail) {
        if ($PaymentDetail instanceof PaymentDetail) {
            $this->PaymentDetails[] = $PaymentDetail;
        }
        return $this;
    }

    public static function PostPayment(PaymentHeader $PaymentHeader, PaymentDetail $PaymentDetail) {
       
        if (!($PaymentHeader instanceof PaymentHeader) || (!$PaymentDetail instanceof PaymentDetail))
            throw new \Exception("Parameters are not instance of payment objects");

        $PaymentHeader->status = 'S';
        $PaymentHeader->audit = 'Updated on ' . date('m/d/Y g:ia') .' by:';// . $UserInfo['username;
        $PaymentHeader->total_amount = Utils::getRawNumber($PaymentHeader->total_amount);
        $PaymentHeader->date = Utils::getDate($PaymentHeader->date, 'Y-m-d');
        $PaymentDetail->ddate = Utils::getDate($PaymentDetail->ddate, 'Y-m-d');        
        $PaymentDetail->amount = 0;
        $PaymentDetail->excess = 0;

        $PaymentDetail->withdrawn = Utils::getRawNumber($PaymentDetail->withdrawn);
        if ($PaymentDetail->amountdistribution == 1) {
            $PaymentDetail->amount = $PaymentDetail->withdrawn;
        }
        elseif ($PaymentDetail->amountdistribution == 2) {
            $PaymentDetail->excess = $PaymentDetail->withdrawn;
        }
        else {
            // auto distribute amounts
            $amountDue = 0;
            $ReleasingModel = new ReleasingModel();
            $Releasings = $ReleasingModel->where('account_id', $PaymentDetail->account_id)
                            ->orderBy('date', 'asc')
                            ->findAll();

            foreach ((array)$Releasings as $Releasing) {
                if ($Releasing->status == 'C')
                    continue;

                $Releasing->populate();
                if ($Releasing->balance <= 0)
                    continue;

                $amountDue += $ReleasingModel->getAmountDue($Releasing, $PaymentDetail->ddate);
            }

            if ($PaymentDetail->withdrawn >= $amountDue) {
                $PaymentDetail->amount = $amountDue;
                $PaymentDetail->excess = $PaymentDetail->withdrawn - $amountDue;
            }
            else {
                $PaymentDetail->amount = $PaymentDetail->withdrawn;
            }                      
        }

        $PaymentHeaderModel = new PaymentHeaderModel();
        $PaymentDetailModel = new PaymentDetailModel();
        $LedgerModel = new LedgerModel();
        
        if (!empty($PaymentHeader->payment_header_id) && (int)$PaymentHeader->payment_header_id > 0) {
            $PaymentHeader = $PaymentHeaderModel->find((int)$PaymentHeader->payment_header_id)->populate();
            $PaymentHeader->audit = $PaymentHeader->audit . ';' . $PaymentHeader->audit;
        }

        $PaymentHeaderModel->save($PaymentHeader->toArray());

        if (empty($PaymentHeader->payment_header_id)) {
            $PaymentHeader->payment_header_id = $PaymentHeaderModel->getInsertID();
        }
        $PaymentDetail->payment_header_id = $PaymentHeader->payment_header_id;

        // save detai;
        $PaymentDetailModel->save($PaymentDetail);
        if (empty($PaymentDetail->payment_detail_id)) {
            $PaymentDetail->payment_detail_id = $PaymentDetailModel->getInsertID();
        }

        // save ledger
        $Ledger = $LedgerModel->where(['account_id'=>$PaymentDetail->account_id, 
                                        'reference'=>$PaymentHeader->payment_id,
                                        'releasing_id'=>$Releasing->releasing_id,
                                        'type'=>'C'])->first();

        return ['PaymentHeader'=>$PaymentHeader, 'PaymentDetai'=>$PaymentDetail];
    }

}