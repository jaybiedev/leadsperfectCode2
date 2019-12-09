<?php
namespace App\Libraries\Common;

use CodeIgniter\Config\Config;

class View 
{
    private $SmartyLib;

    public $pageTitle;
    public $pageHeader;
    public $pageDescription;
    public $baseUrl;

    private $Environment;
    private $stylesheets = [];
    private $javascripts = [];
    private $global_stylesheets = [];
    private $global_javascripts = [];

    function __construct()
    {
        $this->SmartyLib = new SmartyLib();

        // @todo: need to get baseUrl from Config/App
        $this->baseUrl = ($_SERVER['SERVER_PORT'] == '80' ? 'http://' : 'https://') . 
            $_SERVER['HTTP_HOST'] . 
            str_replace($_SERVER['PATH_INFO'], "", $_SERVER['REQUEST_URI']);
   }

    public function getEnvironment()
    {
        // lazy load Environment object
        if ($this->Environment == null)
        {
            $this->Environment = new Environment();
        }

        return $this->Environment;
    }


    public function assignTemplateVariable($name, $value) {
        return $this->SmartyLib->assign($name, $value);    
    }
    
    public function parseTemplateContent($content) {
        return $this->SmartyLib->fetch('eval:' . $content);
    }
    
    
    public function setPageTitle($title) 
    {
        $this->pageTitle = $title;
    }

    public function getPageTitle() 
    {
        return $this->pageTitle;
    }

    public function setPageHeader($header) 
    {
        $this->pageHeader = $header;
    }

    public function getPageHeader() 
    {
        return $this->pageHeader;
    }

    public function setPageDescription($description) 
    {
        $this->pageDescription = $description;
    }

    public function getPageDescription() 
    {
        return $this->pageDescription;
    }

    public function render($view, $data=array(), $return_as_string=false) 
    {
        //if (empty($data['menu'])) {
        //    $data['menu'] = Logic\Menu::getMenu($this->CI->router->fetch_class());
        //}

        //$data['Helper'] = $this->Helper;

        if ($this->pageTitle == null) 
        {
            if ($this->pageHeader != null)
                $this->pageTitle = $this->pageHeader;
            else
            $this->pageTitle = $this->getEnvironment()->product;
        }

        $data['View'] = $this;
        $data['page_id'] = basename($view, ".tpl");

        $data['header'] = array(
            'title'=>$view,
            'stylesheets'=>$this->getStylesheets(),
        );

        $data['footer'] =  array (
            'javascripts'=>$this->getJavascripts(),
        );

        $is_smarty = strpos($view, '.tpl');

        if ($return_as_string && $is_smarty) 
        {
            return $this->SmartyLib->fetch($view, $data);
        }
        
        if ($return_as_string && !$is_smarty) 
        {
            return view($view, $data);
        }
        else 
        {
            $content = null;

            if ($is_smarty) 
                $content .= $this->SmartyLib->fetch($view, $data);
            elseif (file_exists(APPPATH . 'Views/' . $view)) 
                $content .= view($view, $data);
            else 
                $content = "View {$view} not found, ";
            
            @ob_clean();
            echo $content;
            exit;
        }

    }

    public function renderJsonDataTable(array $data, int $draw=1, int $recordsFiltered=-1)
    {
        $dataTable = array(
                "draw"=> $draw,
                "recordsTotal" => count($data),
                "recordsFiltered" => $recordsFiltered == -1 ? count($data) : $recordsFiltered,
                'data'=>$data,
        );
        return json_encode($dataTable);
    }

    public function renderJsonFail($message=null, $data=[])
    {
        // header
        return $this->renderJson($data, false, $message);
    }

    public function renderJsonSuccess($message=null, $data=[])
    {
        return $this->renderJson($data, true, $message);
    }

    public function renderJson($data, $success, $message) {
        $render = array('data'=>$data, 'success'=>$success, 'message'=>$message);
        return json_encode($render);
    }

    // View Stuff
    protected function addStylesheet($file) {
        $this->stylesheets[sha1($file)] = $file;
    }

    protected function addJavascript($file) {
        $this->javascripts[sha1($file)] = $file;
    }

    protected function getStylesheets($include_global=true) 
    {
        $stylesheets = $this->stylesheets;
        
        if (!is_array($stylesheets))
            $stylesheets = [];

        if ($include_global) {
            foreach ((array)$this->global_stylesheets as $file) {
                $stylesheets[sha1($file)] = $file;
            }
        }

        $asset_path = realpath(FCPATH . 'lib/tools/css');
        foreach (glob($asset_path . '/*.css') AS $file) {
            $stylesheets[sha1($file)] = basename($file);
        }

        // autoload module based css
        $modulecss = "css/" . $this->getEnvironment()->getProductModulePath() . '/' . $this->getEnvironment()->page . ".css";
        $file = (FCPATH . $modulecss);
        if (is_file($file))
            $stylesheets[sha1($file)] = $modulecss;

        array_walk($stylesheets, function(&$value, $key) { 
            $value = $this->baseUrl . '/'. $value ; 
        });

        return $stylesheets;
    }

    protected function getJavascripts($include_global=false) 
    {
        $javascripts =  $this->javascripts;
        if (!is_array($javascripts))
            $javascripts = [];

        if ($include_global) {
            foreach ((array)$this->global_javascripts as $file) {
                $javascripts[sha1($file)] = $file;
            }
        }

        $asset_path = realpath(FCPATH . 'lib/tools/js');
        foreach (glob($asset_path . '/*.js') AS $file) {
            $javascripts[sha1($file)] = basename($file);
        }

        // autoload /js/[Product]/[module].js based javascript
        $modulejs = "js/" . $this->getEnvironment()->getProductModulePath() . '/'. $this->getEnvironment()->page . ".js";
        $file = (FCPATH . $modulejs);
        if (is_file($file))
            $javascripts[sha1($file)] = $modulejs;

        array_walk($javascripts, function(&$value, $key) { 
            $value = $this->baseUrl . '/' . $value ; 
        });

        return $javascripts;

    }

}