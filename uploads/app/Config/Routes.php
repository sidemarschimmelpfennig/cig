<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/upload_submit', 'Home::upload_submit');

$routes->get('/pdv', 'PdvController::index');
$routes->post('/pdv/adicionarItem', 'PdvController::adicionarItem');
$routes->post('/pdv/removerItem/(:num)', 'PdvController::removerItem/$1');
$routes->get('/pdv/cancelarVenda', 'PdvController::cancelarVenda');
$routes->post('/pdv/finalizarVenda', 'PdvController::finalizarVenda');
$routes->get('/pdv/gerarCupom/(:num)', 'PdvController::gerarCupom/$1');
