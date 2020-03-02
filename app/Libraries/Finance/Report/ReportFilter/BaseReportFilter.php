<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

abstract class BaseReportFilter
{
    protected $requiredFilters = [];

    public function __construct() {
        //
    }

    public function load($meta) {
        foreach ($meta as $key=>$value) {
            if (property_exists($this, $key))
                $this->$key = $value;
        }
    }

    public function getRequiredFilters() {
        return $this->requiredFilters;
    }

    public function get($key) {
        if (property_exists($this, $key)) {
            return $this->$key;
        }
        return null;
    }
}