<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login()
    {
        return view('client.auth.login');
        
    }

    public function Register()
    {
        return view('client.auth.register');
        
    }
}
