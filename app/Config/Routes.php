<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/Home', 'Home::index');

$routes->get('/Login','Login::index');

$routes->get('/Register','Register::index');

$routes->get('/Tickets','Tickets::index');