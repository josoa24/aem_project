<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::enrollement');
$routes->post('/register', 'UserController::register');
$routes->get('/login', 'UserController::login');

$routes->get('/admin', "AdminController::admin");
