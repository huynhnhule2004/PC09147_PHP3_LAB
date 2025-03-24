<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $apiToken = $_ENV['ghn_api_token'];
        $ghn_shop_id = $_ENV['ghn_shop_id'];
        return view('client.checkout.index', [
            'apiToken' => $apiToken,
            'ghnShopId' => $ghn_shop_id
        ]);
    }
}
