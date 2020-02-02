<?php 
namespace App\Libraries\Finance\Report\ReportFilter;

abstract class BaseReportFilter
{
    public function load($meta) {
        foreach ($meta as $key=>$value) {
            if (property_exists($this, $key))
                $this->$key = $value;
        }
    }
}