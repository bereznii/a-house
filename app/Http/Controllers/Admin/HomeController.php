<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function callbackPage()
    {
        return view('admin.pages.callback-requests');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function manufacturerCharge()
    {
        return view('admin.pages.manufacturer-charge');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userActivity()
    {
        return view('admin.pages.user-activity-history');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function import()
    {
        return view('admin.pages.import');
    }
}
