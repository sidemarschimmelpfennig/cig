<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
//dd() console
//outros dados que que podem ser buscados

//$data['ip'] = $this->request->getIPAddress();
//  $data['server'] = $this->request->getServer('HTTP_USER_AGENT');
//  $data['method'] = $this->request->getMethod();
//dd($data);

class MainController extends BaseController
{
    public function index()
    {

        return redirect()->to("/reservado", );
    }
    public function login()
    {
        $data = [];
        // verificar erros de validacao 
        $validation_errors = session()->getFlashdata('validation_errors');

        if ($validation_errors) {
            $data['validation_errors'] = $validation_errors;
        }
        // verificar erros de login 
        $login_error = session()->getFlashdata('login_error');
        if ($login_error) {
            $data['login_error'] = $login_error;
        }




        return view("login_form", $data);
    }
    public function login_submit()
    {
        $username = $this->request->getPost('text_user');
        $password = $this->request->getPost('text_password');
        // form validation 

        $validation = $this->validate([
            'text_user' => [
                'label' => 'Usuário',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter no minimo {param} caracteres.'
                ],
            ],
            'text_password' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter no minimo {param} caracteres.'
                ],
            ],
        ]);

        //verificar se a validacao esta correta

        if (!$validation) {
            // Aqui pegamos os erros reais
            $errors = $this->validator->getErrors();

            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $errors);
        }

        //verifica se o login é valido


        $user = new UserModel();

        $results = $user->verify_login($username, $password);

        if (!$results) {


            return redirect()
                ->back()
                ->withInput()
                ->with('login_error', 'Nome de usuário ou senha inválido(a)');
        }
        //criar sessao com dados do usuario

        $data_user = [
            'id' => $results->id,
            'username' => $results->user
        ];

        session()->set($data_user);

        return redirect()->to("/", );
    }


    public function reservado()
    {
        return view('reservado');
    }
    public function logout()
    {

        session()->destroy();
        return redirect()->to("/");
    }
}
