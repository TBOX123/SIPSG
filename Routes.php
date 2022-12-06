<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->post('/chart-penyewaan', 'Home::showChartPenyewaan');
$routes->post('/chart-customer', 'Home::showChartCustomer');
$routes->post('/chart-transaksi', 'Home::showChartTransaksi');




$routes->get('/playstation', 'Playstation::index');
$routes->get('/playstation/create', 'Playstation::create');
$routes->post('/playstation/create', 'Playstation::save');
$routes->get('/playstation/create', 'Playstation::create');
$routes->get('/playstation/edit/(:any)', 'Playstation::edit/$1');
$routes->post('/playstation/edit/(:any)', 'Playstation::update/$1');
$routes->get('/playstation/(:any)', 'Playstation::detail/$1');
$routes->delete('/playstation/(:num)', 'Playstation::delete/$1');


$routes->addRedirect('/customer', '/customer/index')->get('/customer/index', 'Customer::index')->setAutoRoute(true);

$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/create', 'Barang::save');
$routes->get('/barang/create', 'Barang::create');
$routes->get('/barang/edit/(:any)', 'Barang::edit/$1');
$routes->post('/barang/edit/(:any)', 'Barang::update/$1');
$routes->get('/barang/(:any)', 'Barang::detail/$1');
$routes->delete('/barang/(:num)', 'Barang::delete/$1');


$routes->group('users', function ($r) {
    $r->get('/', 'Users::index');
    $r->get('index', 'Users::index');
    $r->get('create', 'Users::create');
    $r->delete('(:num)', 'Users::delete/$1');
});

$routes->group('jual', function ($r) {
    $r->get('/', 'Penyewaan::index');
    $r->post('/', 'Penyewaan::addCart');
    $r->get('load', 'Penyewaan::loadCart');
    $r->get('gettotal', 'Penyewaan::getTotal');
    $r->post('update', 'Penyewaan::updateCart');
    $r->post('bayar', 'Penyewaan::pembayaran');
    $r->delete('(:any)', 'Penyewaan::deleteCart/$1');
    $r->get('laporan', 'Penyewaan::report');
    $r->get('exportpdf', 'Penyewaan::exportPDF');
    $r->get('exportpdf2', 'Penyewaan::exportPDF2');
    $r->get('exportpdf3', 'Penyewaan::exportPDF3');
    $r->get('exportexcel', 'Penyewaan::exportExcel');
    $r->get('pengembalian', 'Pengembalian::index');
    $r->post('pengembalian', 'Pengembalian::refund');
    $r->get('pinjaman', 'Penyewaan::reportPinjaman');
    $r->get('pendapatan', 'Penyewaan::reportPendapatan');
    $r->post('pendapatan', 'Penyewaan::reportPendapatan');
    $r->post('pinjaman', 'Penyewaan::reportPinjaman');
});

$routes->group('balik', function ($r) {

    $r->get('laporan', 'Pengembalian::report');
    $r->get('exportpdf', 'Pengembalian::exportPDF');
    $r->get('exportexcel', 'Pengembalian::exportExcel');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
