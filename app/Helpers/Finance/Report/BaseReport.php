<?php 
namespace App\Helpers\Finance\Report;

abstract class BaseReport
{
    protected $Filter;

    public function __construct() {
        $filerClassName = str_replace("\Report\\", "\ReportFilter\\", get_called_class()) . "Filter";
        $this->Filter = new $filerClassName();
    }

    abstract function getReport();

    public function getHeader() {
        return "Company";
    }

    public function setFilters($filters) {
        $this->Filter->load($filters);
    }

    public function getFilters($filters) {
        return $this->Filter;
    }
}