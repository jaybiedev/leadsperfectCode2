<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$bundle = getenv("siteBundle");
if ($bundle == 'psales') {
	$routes->get('/', 'Legacy/Psales::index');	
}
/*

$routes->get('', 'Common/Home::index');
$routes->get('common/forms', 'Common/Standards::forms');

$routes->get('administration', 'Administration/Administration::index');
$routes->get('administration/configuration', 'Administration/Configuration::index');
$routes->post('administration/configuration', 'Administration/Configuration::post');
$routes->get('administration/adminusergroup', 'Administration/Adminusergroup::index');
$routes->get('administration/admin', 'Administration/Admin::index');
$routes->get('administration/menu', 'Administration/Menu::index');

$routes->get('cash', 'Finance/Home::index');
$routes->get('cash/branch', 'Finance/Branch::index');
$routes->get('cash/bank', 'Finance/Bank::index');

$routes->get('finance/account', 'Finance/Account::index');
$routes->get('finance/accountclass', 'Finance/Accountclass::index');
$routes->get('finance/accountgroup', 'Finance/Accountgroup::index');
$routes->get('finance/loantype', 'Finance/Loantype::index');

$routes->get('finance/payment', 'Finance/Payment::index');
$routes->post('finance/payment/entry', 'Finance/Payment::post');

$routes->get('finance/partner', 'Finance/Partner::index');
$routes->get('finance/collectionfee', 'Finance/Collectionfee::index');
$routes->get('finance/servicecharge', 'Finance/Servicecharge::index');
$routes->get('finance/clientbank', 'Finance/Clientbank::index');
$routes->get('finance/branch', 'Finance/Branch::index');
$routes->get('finance/user', 'Finance/User::index');
$routes->get('finance/authenticate', 'Finance/Authenticate::index');
$routes->get('finance/upgrade', 'Finance/Upgrade::index');
$routes->get('finance/report', 'Finance/Report::index');


$routes->get('payroll/deparment', 'Finance/Department::index');
*/

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

if (file_exists(APPPATH . 'Config/Legacy/PsalesRoutes.php'))
{
	require APPPATH . 'Config/Legacy/PsalesRoutes.php';
}
