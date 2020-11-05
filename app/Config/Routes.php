<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// rute untuk pelanggan
$routes->group('pelanggan', function ($routes) {
	$routes->get('/', 'Pelanggan::index');
	$routes->add('tambah', 'Pelanggan::tambah');
	$routes->add('edit/(:any)', 'Pelanggan::edit/$1');
	$routes->add('hapus/(:any)', 'Pelanggan::hapus/$1');
});

// rute untuk paket
$routes->group('paket', function ($routes) {
	$routes->get('/', 'Paket::index');
	$routes->add('tambah', 'Paket::tambah');
	$routes->add('edit/(:any)', 'Paket::edit/$1');
	$routes->add('hapus/(:any)', 'Paket::hapus/$1');
});

// rute untuk langganan
$routes->group('langganan', function ($routes) {
	$routes->get('/', 'Langganan::index');
	$routes->add('tambah', 'Langganan::tambah');
	$routes->add('edit/(:any)', 'Langganan::edit/$1');
	$routes->add('hapus/(:any)', 'Langganan::hapus/$1');
});

/**
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
