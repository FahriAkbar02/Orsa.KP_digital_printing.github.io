<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// masuk halana admin
$routes->get('/admin', 'Admin::index',['filter'=>'role:admin']);
$routes->get('/admin/index', 'Admin::index',['filter'=>'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1',['filter'=>'role:admin']);
$routes->get('/user', 'User::index');
// halaman setelah login berhasil

$routes->get('/note', 'DataTableController::create');
$routes->post('/simpan', 'DataTableController::store');
$routes->get('/hapus/(:num)', 'DataTableController::delete/$1');
$routes->get('/print/(:num)', 'DataTableController::printTransaction/$1');

$routes->get('/laporan', 'DataTableController::index');
$routes->get('/data', 'DataTableController::data');




