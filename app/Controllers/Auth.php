<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        return view("auth/login");
    }

    public function login_post()
    {
        return view("auth/login");
    }

    public function register()
    {
        return view("auth/login");
    }

    public function logout()
    {
        return view("auth/login");
    }
}
