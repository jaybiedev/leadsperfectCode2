<?php 
namespace App\Helpers\Finance\ReportFilter;

abstract class BaseReportFilter
{
    public function load($meta) {
        foreach ($meta as $key=>$value) {
            if (property_exists($this, $key))
                $this->$key = $value;
        }
    }
}