<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth1Controller extends Controller
{
    public function index($id)
    {

        return view('client.auth1.edit');
    }

    public function changePassword()
    {

        return view('client.auth1.change-password');
    }

    public function resetPassword()
    {

        return view('client.auth1.reset-password');
    }
}
