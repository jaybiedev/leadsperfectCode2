<?php 
namespace App\Libraries\Finance\Report;

abstract class BaseReport
{
    protected $Filter;
    protected $db;

    public function __construct() {
        $filerClassName = str_replace("\Report\\", "\Report\ReportFilter\\", get_called_class()) . "Filter";
        //$filerClassName =  "App\Libraries\Finance\Report\ReportFilter\\" . get_called_class() . "Filter";
        $this->Filter = new $filerClassName();
        $this->db = \Config\Database::connect('default', false);
    }

    abstract function getReport();

    public function getHeader() {
        return "Company";
    }

    public function setFilter($filters) {
        $this->Filter->load($filters);
    }

    public function getFilter() {
        return $this->Filter;
    }
}