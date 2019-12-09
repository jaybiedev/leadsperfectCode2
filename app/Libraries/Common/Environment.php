<?php namespace App\Libraries\Common;

class Environment 
{
    private $server;

    public $product = null;
    public $module = null;
    public $page = "index";

    public function __construct() 
    {
        // @todo
        $this->server = $_SERVER;
        $this->load();
    }

    private function load()
    {
        $pathmodule = null;

        $pathInfo = explode("/", $_SERVER['PATH_INFO']);

        if (count($pathInfo) > 0)
        {
            $this->product = $pathInfo[1];
            $this->module = $pathInfo[2];
            if (!empty($pathInfo[3]))
                $this->page = $pathInfo[3];
        }
    }

    public function getProductModulePath()
    {
        $path = ucwords($this->product) . '/' . $this->module;
        return $path;
    }

}