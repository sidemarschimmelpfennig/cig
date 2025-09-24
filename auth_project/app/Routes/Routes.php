<?php

use App\Controllers\MainController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get("/", [MainController::class, 'index']);

$routes->get("/login", [MainController::class, 'login']);
$routes->post("/login_submit", [MainController::class, 'login_submit']);