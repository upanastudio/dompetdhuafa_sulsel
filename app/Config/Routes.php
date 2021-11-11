<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Donasi');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Donasi::index');
$routes->get('/', 'Donatur\Home::index');
$routes->match(['get', 'post'], 'donatur/konfirmasi/(:num)', 'Donatur\Konfirmasi::konfirmasi_donasi/$1');
// $routes->get('donatur/konfirmasi/(:num)', 'Donatur\Konfirmasi::konfirmasi_donasi/$1');

// API
$routes->get('api/', 'Api::documentation');
$routes->get('api/jenis-donasi', 'Api::getJenisDonasi');
$routes->get('api/subjenis-donasi/(:num)', 'Api::getSubJenisDonasi/$1');
$routes->get('api/target-donasi/(:num)', 'Api::getTargetDonasi/$1');
$routes->get('api/metode-pembayaran/(:alpha)', 'Api::getMetodePembayaran/$1');
$routes->get('api/sapaan', 'Api::getSapaan');
$routes->get('api/tipe-donatur', 'Api::getTipeDonatur');
$routes->post('api/submit-donasi', 'Api::submitDonasi');
$routes->get('api/konfirmasi-donasi/(:num)', 'Api::konfirmasiDonasi/$1');
$routes->post('api/submit-konfirmasi-donasi', 'Api::submitKonfirmasiDonasi');

//new routes for kioser
$routes->post('api/donate/(:any)', 'Api::donasi');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
$routes->add("admin/donasi", "Admin\Donasi");
$routes->add("admin/donatur", "Admin\Donatur");
$routes->add("admin/konfirmasi-donasi", "Admin\KonfirmasiDonasi");

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
