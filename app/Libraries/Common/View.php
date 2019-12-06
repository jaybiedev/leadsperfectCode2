<?php
namespace App\Libraries\Common;

class View 
{
    private $SmartyLib;

    public $page_title;
    public $baseUrl;
    public $module;

    function __construct()
    {
        $this->SmartyLib = new SmartyLib();
        $this->baseUrl = ($_SERVER['SERVER_PORT'] == '80' ? 'http://' : 'https://') . 
            $_SERVER['HTTP_HOST'] . 
            str_replace($_SERVER['PATH_INFO'], "", $_SERVER['REQUEST_URI']);
        $this->module = $this->getModule();
    }


    public function assignTemplateVariable($name, $value) {
        return $this->SmartyLib->assign($name, $value);    
    }
    
    public function parseTemplateContent($content) {
        return $this->SmartyLib->fetch('eval:' . $content);
    }
    
    
    public function setPageTitle($title) {
        $this->page_title = $title;
    }

    public function getPageTitle() {
        return $this->page_title;
    }

    public function render($view, $data=array(), $return_as_string=false) 
    {
        //if (empty($data['menu'])) {
        //    $data['menu'] = Logic\Menu::getMenu($this->CI->router->fetch_class());
        //}

        //$data['Helper'] = $this->Helper;
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

    public function renderJson($data, $success, $message) {
        $render = array('data'=>$data, 'success'=>$success, 'message'=>$message);
        echo json_encode($render);
        exit();
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
        $file = (FCPATH . "css/" . $this->module. ".css");
        if (is_file($file))
            $stylesheets[sha1($file)] = basename($file);

        array_walk($stylesheets, function(&$value, $key) { 
            $value = $this->baseUrl . '/css/'. $value ; 
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

        // autoload module based javascript
        $file = (FCPATH . "js/" . $this->module. ".js");
        if (is_file($file))
            $javascripts[sha1($file)] = basename($file);

        array_walk($javascripts, function(&$value, $key) { 
            $value = $this->baseUrl . '/js/'. $value ; 
        });

        return $javascripts;

    }

    private function getModule()
    {
        $module = null;
        $pathInfo = explode("/", $_SERVER['PATH_INFO']);

        if (count($pathInfo) > 0)
            $module = $pathInfo[1];

        return $module;
    }

}