<?php

namespace App\Http\Controllers;

use App\Imports\CatalogImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('admin.pages.import');
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

//        (new CatalogImport)->import(request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLSX);

        Excel::import(new CatalogImport, request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLSX);

        dd(request()->all());

        return view('admin.pages.import');
    }
}
