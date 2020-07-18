<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric'
        ]);

        $isAdded = $this->cartService->updateContent($validatedData);

        return response()->json(['status' => $isAdded]);
    }

    /**
     * @return JsonResponse
     */
    public function updateQuantity(): JsonResponse
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric',
            'productQuantity' => 'required|numeric'
        ]);

        $this->cartService->updateQuantity($validatedData);

        return response()->json(['status' => true]);
    }
}
