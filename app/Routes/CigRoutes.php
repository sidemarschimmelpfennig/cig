<?php

use App\Controllers\Auth;
use App\Controllers\Home;
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

