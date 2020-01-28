<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        return view('client.checkout.index')->with([
            'sidebarData' => ClientRepository::sidebarData()
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

    /**
     * Add product to cart.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update()
    {
        dd(request()->all());
    }
}
