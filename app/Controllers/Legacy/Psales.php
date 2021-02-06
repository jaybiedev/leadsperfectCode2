<?php namespace App\Controllers\Legacy;
use App\Controllers\BaseController;
use App\Helpers\Utils;

class Psales extends BaseController
{
    private $legacy_path = ROOTPATH . "legacy/psales/";

	public function index()
	{
        $this->View->setPageHeader('Pefect Sales');
        $this->View->setModalTitle('');

        $method =  $this->request->uri->getSegment(1) ?: 'home';

        if (!method_exists($this, $method)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $working_dir = $this->legacy_path;
        if ($method != 'home') {
            $working_dir .= $method . "/";
        }

        chdir($working_dir);

        return $this->$method();
    }

    private function home() {

        $data = ['contents'=>'Test'];
        ob_start();
        require_once("index.main.php");
        $data['contents'] = ob_get_clean();
        ob_start();
        
        
        return $this->View->render('Legacy/Psales/_default.tpl', $data);
    }

    private function inventory() {

        $data = ['contents'=>'Test'];
        ob_start();
        require_once("index.inventory.php");
        $data['contents'] = ob_get_clean();
        ob_start();
        
        
        return $this->View->render('Legacy/Psales/_default.tpl', $data);
    }
}