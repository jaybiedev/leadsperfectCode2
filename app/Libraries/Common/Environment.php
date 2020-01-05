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
        $pathInfo = explode("/", uri_string());

        if (count($pathInfo) > 0)
        {
            $this->product = $pathInfo[0];
            if (!empty($pathInfo[1]))
                $this->module = $pathInfo[1];
            if (!empty($pathInfo[2]))
                $this->page = $pathInfo[2];
        }
    }

    public function getProductModulePath()
    {
        $path = ucwords($this->product) . '/' . $this->module;
        return $path;
    }

    public function getSlug()
    {
        return $this->product . '/' . $this->module;
    }
}