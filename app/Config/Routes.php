<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HoraTrabalhada::index');
##$routes->add('/home', 'Home::index');
$routes->setAutoRoute(true);
$routes->post('/horaTrabalhada/save_registro', 'Horatrabalhada::save_registro');
