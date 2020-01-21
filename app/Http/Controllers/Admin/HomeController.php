<?php

namespace App\Http\Controllers;

use App\Imports\CatalogImport;
use App\Imports\Import;
use App\Repositories\ImportRepository;
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
        $time_start = microtime(true);

        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', '90');

        $import = new Import();
        $import->onlySheets( 2);

        Excel::import($import, request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLSX);

        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);

        logger((memory_get_usage(true)/1024/1024)." MiB, " .(memory_get_peak_usage(true)/1024/1024)." MiB (peak), {$execution_time}sec");

        return redirect()->route('home');
    }
}
