<?php

use App\Controllers\Auth;
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */

$routes->get("/", [Auth::class, 'index']);

$routes->get("/home", [Home::class, 'index']);