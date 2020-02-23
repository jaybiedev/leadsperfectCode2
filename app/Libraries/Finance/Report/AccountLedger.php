<?php 
namespace App\Libraries\Finance\Report;
use App\Helpers\Utils;
use App\Helpers\Finance\FinanceUtils;
use App\Libraries\Finance\Security;
use \App\Libraries\Finance\SysConfig;

class AccountLedger extends BaseReport 
{
    public function __construct() {

        $this->previewFontSize = 13;
        parent::__construct();
    }

    public function generatetReport($is_draft_printer=false) {
    }
}