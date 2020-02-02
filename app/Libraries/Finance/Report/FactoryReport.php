<?php 
namespace App\Libraries\Finance\Report;

class FactoryReport
{
    public static function factory($name) 
    {
        $baseClassName = "\Libraries\Finance\Report\\";
        $className = $baseClassName . $name;
        $classFile = APPPATH . str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";

        if (!file_exists($classFile)) {
            $className = $baseClassName . ucwords($name);
            $classFile = APPPATH . str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";
    
            if (!file_exists($classFile)) {
                throw new \Exception("Report controller not found: " . $className);
            }
        }
        $className = "\App" . $className;

        $Report = new $className();
        return $Report;
    }
}