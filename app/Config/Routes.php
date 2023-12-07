<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Show product from Shopify API
$routes->get('show-products', 'Home::showProducts');
$routes->get('sync-page', 'ProductController::index');
//Sync Product
$routes->post('product/syncProducts', 'ProductController::syncProducts');
//Delete Product 
$routes->post('product/deleteAllProducts', 'ProductController::deleteAllProducts');
//all product in API
$routes->get('api/products', 'ProductApiController::getAllProducts');
$routes->get('product/getProductDetails/(:num)', 'ProductController::getProductDetails/$1');
$routes->get('edit-product', 'ProductController::edit');
$routes->post('product/save', 'ProductController::save');

