<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RestaurantModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    public function login()
    {
        //load restaurants


        $restaurants_model = new RestaurantModel();
        $data['restaurants'] = $restaurants_model->select('id, name')->findAll();


        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        $data['select_restaurant'] = session()->getFlashdata('select_restaurant');


        return view("auth/login", $data);
    }

    public function login_post()
    {
        // $restaurant_id = Decrypt($this->request->getPost('select_restaurant'));
        // echo $restaurant_id;

        $validation = $this->validate([
            'text_username' => [
                'label' => 'Usuário',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => 'O campo {field} é Obrigatório',
                    'min_length' => 'O campo {field} deve ter, no minimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],
            'text_password' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => 'O campo {field} é Obrigatório',
                    'min_length' => 'O campo {field} deve ter, no minimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],
            'select_restaurant' => [
                'label' => 'Restaurante',
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo {field} é Obrigatório',
                ]
            ]
        ]);

        if (!$validation) {
            session()->setFlashdata('select_restaurant', Decrypt($this->request->getPost('select_restaurant')));
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('text_username');
        $password = $this->request->getPost('text_password');
        $id_restaurant = Decrypt($this->request->getPost('select_restaurant'));


        $user_model = new UserModel();

        $user = (object) $user_model->check_for_login($username, $password, $id_restaurant);

        if (!$user) {
            session()->setFlashdata('select_restaurant', Decrypt($this->request->getPost('select_restaurant')));
            return redirect()->back()->withInput()->with('login_error', 'Usuário ou senha incorretos');
        }

        $restaurants_model = new RestaurantModel();
        $restaurant_name = $restaurants_model
            ->select('name')
            ->find($user->id_restaurant)
            ->name;
        $data_user = [
            'id' => $user->id,
            'name' => $user->name,
            'id_restaurant' => $user->id_restaurant,
            'restaurant_name' => $restaurant_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'roles' => $user->roles,

        ];

        session()->set('user', $data_user);

        return redirect()->to("/");
    }

    public function register()
    {
        return view("auth/login");
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to("/");
    }
}
