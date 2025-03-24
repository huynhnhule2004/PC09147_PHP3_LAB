<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product1Controller extends Controller
{
    public function index()
    {
        return view('client.product1.index');
    }

    public function single($id)
    {
        return view('client.product1.single');
    }
}
