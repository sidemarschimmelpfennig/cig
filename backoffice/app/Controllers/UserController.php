<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $users = new UserModel();
        $response = $users->findAll();
        $data = [
            'title' => 'Usuários',
            'users' => $response
        ];
        return view("users", $data);
    }
    public function show()
    {
        $id = $this->request->getGet('id');

        $users = new UserModel();
        //$response = $users->where('id', $id)->find(); todos os resultado cujo o id for 1 em uma coleção de objetos[array]
        //$response = $users->where('id', $id)->first(); primeiro resultado
        // $response = $users->find($id); buca pelo id
        $response = $users->find([1, 3, 5]); // busca uma lista
        $data = [
            'title' => 'Usuário',
            'users' => $response
        ];
        return view("users", $data);
    }
}
