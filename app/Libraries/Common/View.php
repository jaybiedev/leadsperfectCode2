<?php
namespace App\Libraries\Common;

use App\Helpers\Utils;
use App\Models\Common\MenuModel;
use CodeIgniter\Config\Config;

class View 
{
    private $SmartyLib;

    public $pageTitle;
    public $pageHeader;
    public $pageDescription;
    public $modalTitle;
    public $Session;

    public $modalID;
    public $baseUrl;
    public $moduleID;
    public $productUrl;
    public $hasData=false;

    private $Environment;
    private $stylesheets = [];
    private $javascripts = [];
    private $global_stylesheets = [];
    private $global_javascripts = [];

    function __construct()
    {
        $this->Session =  \Config\Services::session();
        $this->SmartyLib = new SmartyLib();
        $this->baseUrl = base_url();
        $this->productUrl = base_url() . "/" . $this->getEnvironment()->product;
   }

   public function getFlashErrorMessage() {
       return $this->Session->getFlashData('flashError');
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

    public function setModalTitle($modalTitle) 
    {
        $this->modalTitle = $modalTitle;
        $this->modalID = str_replace(" ", "", $this->modalTitle);
    }

    public function getModalTitle() 
    {
        return $this->modalTitle;
    }

    public function render($view, $data=array(), $return_as_string=false) 
    {
        if (!empty($data))
            $this->hasData = true;

        if (empty($data['menu'])) {
            $data['menu'] = null;
            $product = $this->getEnvironment()->product;
            if (!empty($product))
            {
                $MenuModel = new MenuModel();
                $data['menu'] = $MenuModel->getMenuTree("Top." . ucwords($product), '{1}', 'sort_order');
            }
        }
        //$data['Helper'] = $this->Helper;

        if ($this->pageTitle == null)  {
            if ($this->pageHeader != null)
                $this->pageTitle = $this->pageHeader;
            else
                $this->pageTitle = $this->getEnvironment()->product;
        }

        if (empty($this->moduleID)) {
            $this->moduleID = $this->getEnvironment()->module;
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

        $data['flash_error_message'] = $this->getFlashErrorMessage();

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

    public function renderJsonDataTable(array $data, int $recordsTotal=-1)
    {
        $dataTable = array(
                "recordsFiltered" => $recordsTotal,
                "recordsTotal" => $recordsTotal == -1 ? count($data) : $recordsTotal,
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
        echo json_encode($render);
        exit;
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