<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;

use App\Libraries\Common\Environment;
// @todo : need to make this factory/generic instead of just finance
use App\Libraries\Finance\Security;

class AdministrationBaseController extends BaseController
{
    private $authentication_exception_slugs = [];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
        
        if (Security::isAdmin() == false) {
            $Environment = new Environment();
            if (!in_array($Environment->getSlug(), $this->authentication_exception_slugs))
            {
                $this->setFlashErrorMessage("Administrator permission required.");
                $this->redirectTo("/");
            }
        }
    }
}