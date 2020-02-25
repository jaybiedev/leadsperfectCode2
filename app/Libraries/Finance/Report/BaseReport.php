<?php 
namespace App\Libraries\Finance\Report;

use App\Libraries\Administration\SysConfig;
use App\Helpers\Utils;

abstract class BaseReport
{
    protected $db;

    public $previewFontSize=18;
    public $Filter;
    public $content;
    public $pageLength = 55;

    public function __construct() {
        $filerClassName = str_replace("\Report\\", "\Report\ReportFilter\\", get_called_class()) . "Filter";
        //$filerClassName =  "App\Libraries\Finance\Report\ReportFilter\\" . get_called_class() . "Filter";
        $this->Filter = new $filerClassName();
        $this->db = \Config\Database::connect('default', false);
    }

    abstract function generateReport();

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

    public function validate() {
        if ($this->Filter->getRequiredFilters()) {
            foreach ($this->Filter->getRequiredFilters() as $filter) {
                if ($this->Filter->get($filter) === null)
                    throw new \Exception("Missing required filter " . $filter);
            }
        }

        return true;
    }
}