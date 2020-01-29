<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ClientRepository;
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
        $ids = session('cart');

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
    public function store()
    {
//        dd(request()->all());

        return view('client.checkout.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
            'thank' => true
        ]);
    }
}
