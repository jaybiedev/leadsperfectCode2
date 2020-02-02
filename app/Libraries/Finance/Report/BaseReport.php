<?php 
namespace App\Libraries\Finance\Report;

use App\Libraries\Finance\SysConfig;
abstract class BaseReport
{
    protected $db;

    public $previewFontSize=18;
    public $Filter;
    public $content;

    public function __construct() {
        $filerClassName = str_replace("\Report\\", "\Report\ReportFilter\\", get_called_class()) . "Filter";
        //$filerClassName =  "App\Libraries\Finance\Report\ReportFilter\\" . get_called_class() . "Filter";
        $this->Filter = new $filerClassName();
        $this->db = \Config\Database::connect('default', false);
    }

    abstract function generatetReport();

    public function getHeader() {
        return SysConfig::get("BUSINESS_NAME");
    }

    public function setFilter($filters) {
        $this->Filter->load($filters);
        return $this;
    }

    public function getFilter() {
        return $this->Filter;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }
}