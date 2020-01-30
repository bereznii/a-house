<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ClientRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Return client checkout page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout()
    {
        $content = (new CartRepository())->getContent();

        return view('client.checkout.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
            'content' => $content
        ]);
    }

    /**
     * Return client checkout page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(OrderRequest $request)
    {
        $validated = $request->validated();

        $order = app(OrderRepository::class);

        $order->storeOrder($validated);

        session()->flush();
        session()->flashInput(request()->input());


        return view('client.checkout.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
            'thank' => true
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeFromOrder($id)
    {
        request()->session()->forget("cart.{$id}");

        return $this->checkout();
    }
}
