<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('stanice/(:num)', 'Main::stanice/$1'); //routa pro stanice(číslo) a zavolá controller Main metodu stanice s parametrem
