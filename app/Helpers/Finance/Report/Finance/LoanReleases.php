<?php 
namespace App\Helpers\Finance\Report\Finance;
use App\Helpers\Finance\Report\BaseReport;

class LoanReleases extends BaseReport 
{
    public function __construct() {
        parent::__construct();
    }

    public function getReport() {
        $header = $this->getHeader();
        $detail = '';

        $content = $header . $detail;
        return $content;
    }
}