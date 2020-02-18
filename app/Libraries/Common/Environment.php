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

    public function getProductModulePath($is_product_upper=true, $is_module_upper=false)
    {
        $product = $this->product;
        $module = $this->module;

        // hack to handle cashposition
        if (strtolower($this->product) == 'cash')
            $product = 'finance';

        if ($is_product_upper)
            $product = ucwords($product);
        
        if ($is_module_upper) 
            $module = ucwords($module);

        $path = $product . '/' . $module;

        return $path;
    }

    public function getSlug()
    {
        return $this->product . '/' . $this->module;
    }
}