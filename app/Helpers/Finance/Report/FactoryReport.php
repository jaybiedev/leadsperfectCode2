<?php 
namespace App\Helpers\Finance\Report;

class FactoryReport
{
    public static function factory($name) 
    {
        $className = "\Helpers\Finance\Report\Finance\\{$name}";
        $classFile = APPPATH . str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";

        if (!file_exists($classFile)) {
            $className = "\Helpers\Finance\Report\Finance\\" . ucwords($name);
            $classFile = APPPATH . str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";
    
            if (!file_exists($classFile)) {
                throw new \Exception("Report controller not found.");
            }
        }
        $className = "\App" . $className;

        $Report = new $className();
        return $Report;
    }
}