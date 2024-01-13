<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// masuk halana admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->get('/user', 'User::index');
// halaman setelah login berhasil

$routes->get('/note', 'OrderController::create');
$routes->post('/simpan', 'OrderController::store');
$routes->get('/hapus/(:num)', 'OrderController::delete/$1');
$routes->get('/printPerID/(:num)', 'OrderController::printTransaction/$1');
$routes->get('/print_all', 'OrderController::printAll');
$routes->get('/laporanAll', 'OrderController::laporanAll');


$routes->get('/laporan', 'OrderController::index');
$routes->get('/data', 'OrderController::data');
