<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/form', 'Home::test');
$routes->get('/send', 'Home::sendData');
$routes->post('/post', 'Works::sendFile');
$routes->get('/view', 'Works::displayFile');
