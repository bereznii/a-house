<?php

namespace App\Http\Controllers;

use App\Imports\CatalogImport;
use App\Imports\Import;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '90');

//        Cache::forget('make_id');
//        Cache::forget('model_id');
        $import = new Import();
        $import->onlySheets( 1);

        Excel::import($import, request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLSX);

        dd('DONE', request()->all());

        return view('admin.pages.import');
    }
}
