<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    private CartService $cartService;

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric'
        ]);

        $this->cartService->updateContent($validatedData);

        return response()->json(['status' => true]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuantity()
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric',
            'productQuantity' => 'required|numeric'
        ]);

        $this->cartService->updateQuantity($validatedData);

        return response()->json(['status' => true]);
    }
}
