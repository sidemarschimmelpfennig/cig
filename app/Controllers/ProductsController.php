<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Produtos',
            'page' => 'Produtos'
        ];
        return view('dashboard/products/index', $data);
    }


    public function new_product()
    {
        $data = [
            'title' => 'Produtos',
            'page' => 'Novo Produto'
        ];
        return view('dashboard/products/new_product', $data);
    }
}
