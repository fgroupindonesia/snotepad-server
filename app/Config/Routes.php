<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::random');
$routes->get('/form', 'Home::test');
$routes->get('/send', 'Home::sendData');
$routes->get('/write', 'Home::writeNote');
$routes->post('/post', 'Works::sendFile');
$routes->post('/update-passkey', 'Works::update_passkey');
$routes->post('/translate-to-code', 'Works::translate_to_code');
$routes->post('/translate-to-code-nonsecured', 'Works::translate_to_code');
$routes->post('/translate-from-code', 'Works::translate_from_code');
$routes->get('/view', 'Works::displayFile');
$routes->get('/tutorial/instalasi', 'Home::tutorialInstalasi');
$routes->get('/tutorial/penggunaan', 'Home::tutorialPenggunaan');
$routes->get('/tutorial/settings', 'Home::tutorialSettings');
