<?php

use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\ProductsController;
use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */

$routes->get("/", [Home::class, 'index']);


$routes->group("auth", function ($routes) {
    $routes->get("login", [Auth::class, 'login']);
    $routes->post("login", [Auth::class, 'login_post']);
    $routes->get("logout", [Auth::class, 'logout']);
    $routes->get("register", [Auth::class, 'register']);
});


//Products Routes
$routes->get('/products', [ProductsController::class, 'index']);
$routes->get('/products/new', [ProductsController::class, 'new_product']);
