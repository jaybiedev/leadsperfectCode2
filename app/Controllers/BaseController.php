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

			header("location:/" . $product . "/" . $p);
			exit;
		}
	}

	public function redirectTo($slug = null)
	{
		$url = base_url() . "/" . $slug;
		header("location: " . $url);
		exit;
	}


}
