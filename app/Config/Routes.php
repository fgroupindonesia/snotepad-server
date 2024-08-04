<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::random');
$routes->get('/form', 'Home::test');
$routes->get('/send', 'Home::sendData');
$routes->post('/post', 'Works::sendFile');
$routes->get('/view', 'Works::displayFile');
$routes->get('/tutorial/instalasi', 'Home::tutorialInstalasi');
$routes->get('/tutorial/penggunaan', 'Home::tutorialPenggunaan');
$routes->get('/tutorial/settings', 'Home::tutorialSettings');
