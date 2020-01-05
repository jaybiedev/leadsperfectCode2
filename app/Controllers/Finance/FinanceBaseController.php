<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;

use App\Libraries\Finance\Authenticate as AuthenticateLib;
use App\Libraries\Common\Environment;

class FinanceBaseController extends BaseController
{
    private $exception_slugs = ["finance/authenticate"];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
        
        if (AuthenticateLib::isLogged($this->Session) == false)
        {
            $Environment = new Environment();
            if (!in_array($Environment->getSlug(), $this->exception_slugs))
            {
                $this->redirectTo("finance/authenticate?redirectTo=" . $Environment->getSlug());
            }
        }
    }
}