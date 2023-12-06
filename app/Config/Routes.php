<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('show-products', 'Home::showProducts');
$routes->get('sync-page', 'ProductController::index');
$routes->post('product/syncProducts', 'ProductController::syncProducts');
$routes->post('product/deleteAllProducts', 'ProductController::deleteAllProducts');
