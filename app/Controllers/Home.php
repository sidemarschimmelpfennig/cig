<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['user'] = (object) session()->get('user');
        return view('dashboard/home', $data);
    }
}
