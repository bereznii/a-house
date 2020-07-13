<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\ClientService;

class NewClientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('client.v2.pages.landing', [
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts()
    {
        return view('client.v2.pages.contacts', [
            'breadcrumbs' => [
                'title' => 'Контакты'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('client.v2.pages.about', [
            'breadcrumbs' => [
                'title' => 'О нас'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        return view('client.v2.pages.cart', [
            'breadcrumbs' => [
                'title' => 'Корзина'
            ],
            'currentUrl' => url()->current(),
            'content' => null
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delivery()
    {
        return view('client.v2.pages.delivery', [
            'breadcrumbs' => [
                'title' => 'Доставка и оплата'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog()
    {
        return view('client.v2.pages.catalog', [
            'breadcrumbs' => [
                'title' => 'Каталог'
            ],
            'sidebarData' => (new ClientService())->sidebarData(),
            'currentUrl' => url()->current()
        ]);
    }
}

