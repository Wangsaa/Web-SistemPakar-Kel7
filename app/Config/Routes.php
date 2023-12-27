<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/service', 'Home::service');
$routes->get('/contact', 'Home::contact');

$routes->get('/user/detect', 'userController::detect');
$routes->get('/user/profile/edit', 'UserController::edit_profile');
$routes->put('/user/profile/update', 'UserController::update_profile');
$routes->get('/user/profile', 'UserController::profile');
$routes->post('/user/store', 'userController::store');
$routes->get('logout', 'AuthController::logout');
$routes->get('login', 'AuthController::login');

$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/profile', 'AdminController::profile');
$routes->put('/admin/profile/update', 'AdminController::update_profile');
$routes->get('/admin/profile/edit', 'AdminController::edit_profile');

$routes->get('/admin/table/users', 'AdminController::tableusers');
$routes->put('/admin/table/users/edit/(:any)', 'AdminController::updateusers/$1');
$routes->get('/admin/table/users/edit/(:any)', 'AdminController::editusers/$1');
$routes->get('/admin/table/users/(:any)', 'AdminController::showusers/$1');


// table penyakit
$routes->get('/admin/table/penyakit', 'AdminController::tablepenyakit');
$routes->put('/admin/table/penyakit/(:segment)', 'AdminController::upd_penyakit/$1');
$routes->get('/admin/table/penyakit/(:segment)/edit_form', 'AdminController::edit_form/$1');
$routes->delete('/admin/table/penyakit/(:segment)', 'AdminController::destroy/$1');
$routes->get('/admin/table/penyakit/(:segment)', 'AdminController::show/$1');

$routes->add('/admin/table/add_penyakit', 'AdminController::add_penyakit');
$routes->add('/admin/table/up_penyakit', 'AdminController::up_penyakit');

// table gejala
$routes->get('/admin/table/gejala', 'AdminController::tablegejala');
$routes->put('/admin/table/gejala/(:segment)', 'GejalaController::upd_gejala/$1');
$routes->get('/admin/table/gejala/(:segment)/edit_gejala', 'GejalaController::edit_gejala/$1');
$routes->delete('/admin/table/gejala/(:segment)', 'GejalaController::destroy/$1');

$routes->get('/admin/table/gejala/(:segment)', 'GejalaController::show/$1');

$routes->add('/admin/table/add_gejala', 'GejalaController::add_gejala');
$routes->add('/admin/table/up_gejala', 'GejalaController::up_gejala');

// table mahasiswa
$routes->get('/admin/table/mahasiswa', 'AdminController::Mahasiswa');
$routes->resource('mahasiswa', ['controller' => 'MahasiswaController']);



// rule
$routes->get('admin/table/rule', 'AdminController::tablerule');
$routes->get('/admin/table/rule/(:segment)', 'RuleController::show/$1');
$routes->put('/admin/table/rule/(:segment)', 'RuleController::upd_rule/$1');
$routes->get('/admin/table/rule/(:segment)/edit_gejala', 'RuleController::edit_rule/$1');
$routes->delete('/admin/table/rule/(:segment)', 'RuleController::destroy/$1');

