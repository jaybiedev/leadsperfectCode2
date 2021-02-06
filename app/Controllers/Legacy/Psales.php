<?php namespace App\Controllers\Legacy;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\BankModel;

class Psales extends BaseController
{
	public function index()
	{
        $this->View->setPageHeader('Pefect Sales');
        $this->View->setModalTitle('');

        $method =  $this->request->uri->getSegment(1);

        if (!method_exists($this, $method)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->$method();
    }

    private function inventory() {

        $data = ['contents'=>'Test'];
        /*
        ob_start();
        require_once(__DIR__ . "/Legcay/LegacyPsales/index.php");
        $data['contents'] = ob_get_clean();
        ob_start();
        */

        return $this->View->render('Legacy/Psales/_default.tpl', $data);
    }
}