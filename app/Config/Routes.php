<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::enrollement');
$routes->post('/register', 'UserController::register');
$routes->get('/login', 'UserController::login');
$routes->post('/loginUser', 'UserController::loginUser');

$routes->get('/admin', "AdminController::admin");
$routes->get('/admin/validDemand', "AdminController::validDemand");
$routes->post('/admin/dashboard', "AdminController::loginAdmin");
