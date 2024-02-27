<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Masuk halaman admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/editUserAndGroup/(:num)', 'Admin::editUserAndGroup/$1');

$routes->get('/user', 'User::index');
$routes->get('/user/edit/(:num)', 'User::editProfile/$1');
$routes->post('user/update/(:num)', 'User::updateProfile/$1');


$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pelanggan/tambah', 'PelangganController::tambah');
$routes->post('/pelanggan/simpan', 'PelangganController::simpan');
$routes->get('/delete/(:any)', 'PelangganController::delete/$1');
$routes->get('/processDelete/(:num)', 'PelangganController::processDelete/$1');

$routes->post('/pesanan/simpanPesanan', 'PelangganController::simpanPesanan', ['as' => 'simpan_pesanan']);

$routes->get('/delete/(:any)', 'PelangganController::delete/$1');
$routes->get('/rocessDelete/(:any)', 'PelangganController::processDelete/$1');
$routes->get('/detailPesanan/(:any)', 'PelangganController::detailPesanan/$1');
$routes->get('/search', 'PelangganController::searchByName');

$routes->get('/pesanan', 'PesananController::index');
$routes->get('/pesanan/tambah', 'PesananController::tambah');
$routes->post('/simpan', 'PesananController::simpan');
$routes->get('/laporan', 'PesananController::findByDateRange');
$routes->get('/cari-data', 'PesananController::findByDateRange');

$routes->get('/cari-data', 'PesananController::findByDateRange');
$routes->get('/laporan', 'PesananController::findByDateRange');
