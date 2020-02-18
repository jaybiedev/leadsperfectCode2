<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Libraries\Common\Environment;
use App\Models\BaseModel;
use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	protected $View;
	protected $Session;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		$this->Session =  \Config\Services::session();
		$this->Session->start();

		$this->View = new \App\Libraries\Common\View();

		// handle redirects
		$this->handleRedirects();


		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	public function isPost()
	{
		return (strtolower($this->request->getMethod()) == 'post');
	}

	private function handleRedirects()
	{
		// supporting $p redirect
		$p = $this->request->getGet('p');
		if (!empty($p))
		{
			$Environment = new Environment();
			$product = $Environment->product;
			// redirect()->to($product . "/" . $p); 

			header("location:/" . $product . "/" . str_replace("_", "",$p));
			exit;
		}
	}

	public function redirectTo($slug=null, $message=null)
	{
		$url = base_url() . "/" . $slug;
		if (!empty($message))
			$url .= "?message={$message}";

		header("location: " . $url);
		exit;
	}

	public function setFlashErrorMessage($message) {

		if (empty($message))
			return;

		$flashError = $this->Session->getFlashdata('flashError');
		if (empty($flashError))
			$flashError = [];
		
		$flashError[] = $message;

		$this->Session->setFlashData("flashError", $flashError);
	}

	/**
	 * generic get method accepts $id as primaryKey
	 */
	public function get() {
		
		$id = $this->request->getGet('id', FILTER_VALIDATE_INT);
		$Model = BaseModel::factory($this->View->getEnvironment()->getProductModulePath(true, true));			
		if (!is_object($Model))
			throw new \Exception("Invalid model, unable to save.");
		
		$data = [];

		if (!empty($id))
		{
			$data = $Model->find($id)->populate();
		}

		return  $this->View->renderJsonSuccess(null, $data);
	
	}

	/* generic post method with jason response
	* for updating single record on single table
	* requires Model, primaryKey, enabled.
	* $enabled has to be sent as FALSE or 0 for record to be deleted
	*/
	public function post() {

		try {
			$data = [];

			$enabled = $this->request->getPost('enabled');
			if ($enabled === null || $enabled === '') {
				$enabled = true;
			}
			$enabled = (bool)$enabled;

			$id = $this->request->getPost('partner_id', FILTER_VALIDATE_INT);
			$fields = $this->request->getPost('field');

			$Model = BaseModel::factory($this->View->getEnvironment()->getProductModulePath(true, true));			
			if (!is_object($Model))
				throw new \Exception("Invalid model, unable to save.");
			

			$primaryKey = $Model->getPrimaryKey();
			$restoreIdentityKey = $Model->getRestoreIdentityKey();
			if (empty($restoreIdentityKey) && isset($fields[$Model->table])) {
				$restoreIdentityKey = $Model->table; // by design usually the identifier is same as table name
			}

			if (!empty((int)$id)) {
				$fields[$primaryKey] = $id;
			}

			if (!$enabled) {
				if (!empty((int)$id))
					$Model->delete($id);

				return $this->View->renderJsonSuccess();	
			}

			if (empty($id) && !empty($restoreIdentityKey) && !empty($fields[$restoreIdentityKey])) {
				// restore previously deleted record if found using restoreIdentityKey
				$Entity = $Model->onlyDeleted()->where("LOWER({$restoreIdentityKey})", strtolower($fields[$restoreIdentityKey]))->first();

				if (is_object($Entity) && $Entity->populate()) {
					$fields['date_deleted'] = null;
					$fields[$primaryKey] = $Entity->$primaryKey;
				}
			}

			$Model->save($fields);
		}
        catch (\Exception $e) {
            return $this->View->renderJsonFail($e->getMessage());
        }

        return $this->View->renderJsonSuccess();			
	}

}
