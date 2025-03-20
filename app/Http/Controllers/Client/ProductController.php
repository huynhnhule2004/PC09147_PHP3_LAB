<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('client.product.product');
    }

    public function detail($id)
    {
        //1000 dòng code đây nè
        $data = "Dữ liệu này đã được xử lý ở 1000 dòng code ở trên {$id}";
        return view('client.product.product-detail', ['id' => $data]);
    }
}
