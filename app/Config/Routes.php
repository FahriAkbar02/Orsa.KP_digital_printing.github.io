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
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/editUserAndGroup/(:num)', 'Admin::editUserAndGroup/$1');


$routes->get('/forgot', 'User::forgot');
$routes->get('/reset', 'User::reset');
$routes->get('/user', 'User::index');

$routes->get('/user/edit/(:num)', 'User::editProfile/$1');
$routes->post('user/update/(:num)', 'User::updateProfile/$1');



// halaman setelah login berhasil

$routes->get('/note', 'OrderController::create');
$routes->post('/simpan', 'OrderController::store');
$routes->get('/hapus/(:num)', 'OrderController::delete/$1');
$routes->get('/printPerID/(:num)', 'OrderController::printTransaction/$1');
$routes->get('/print_all', 'OrderController::findByDateRange');
$routes->get('/laporanAll', 'OrderController::laporanAll');
$routes->get('/searchName/index', 'OrderController::index');
$routes->get('/cari-data', 'OrderController::findByDateRange');

$routes->get('/laporan', 'OrderController::index');
$routes->get('/data', 'OrderController::data');
