<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('client.order.history');
    }

    public function detail($id)
    {
        return view('client.order.detail');
    }

    public function cancel($id)
    {
        return view('client.order.cancel');
    }

    public function thankYou()
    {
        return view('client.order.thank-you');
    }
}
