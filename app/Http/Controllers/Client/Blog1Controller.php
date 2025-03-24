<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Blog1Controller extends Controller
{
    public function index()
    {
        return view('client.blog1.index');
    }

    public function single($id)
    {
        return view('client.blog1.single');
    }
}
