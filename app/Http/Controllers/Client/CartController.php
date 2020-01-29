<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $productId = request('productId');

        session(["cart.{$productId}" => $productId]);

        return response()->json(['status' => true]);
    }
}
