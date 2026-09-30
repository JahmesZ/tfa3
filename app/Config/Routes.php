<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/', static fn () => redirect()->to('customers'));
foreach (['customers' => 'Customers', 'users' => 'Users'] as $p => $c) {
    $routes->get($p, "$c::index");
    $routes->get("$p/new", "$c::new");
    $routes->post("$p/create", "$c::create");
    $routes->get("$p/(:num)/edit", "$c::edit/$1");
    $routes->post("$p/(:num)/update", "$c::update/$1");
}
