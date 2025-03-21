<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('client.blog.index');

    }

    public function lienhe()
    {
        return view('client.blog.lienhe');
    }

    public function lay1tin($id)
    {
        $data = ['id' => $id];
        
        return view('client.blog.chitiet', $data);
    }
}
