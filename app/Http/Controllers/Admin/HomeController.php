<?php

namespace App\Http\Controllers;

use App\Imports\Import;
use App\Models\CallbackRequest;
use App\Repositories\CallbackRequestRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * @var CallbackRequestRepository
     */
    private CallbackRequestRepository $callbackRequestRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CallbackRequestRepository $callbackRequestRepository)
    {
        $this->middleware('auth');
        $this->callbackRequestRepository = $callbackRequestRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @param array|null $countedRows
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(array $countedRows = null)
    {
        return view('admin.pages.import')->with([
            'countedRows' => $countedRows
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function callbackPage()
    {
        $records = CallbackRequest::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.pages.callback-requests')->with([
            'records' => $records
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmCallback(Request $request)
    {
        $isChecked = (int)(request('value') == 'true');

        $status = $this->callbackRequestRepository->confirmCallbackRequest($isChecked);

        return response()->json([
            'status' => $status
        ]);
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
        $import->onlySheets([0]);

        Excel::import($import, request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLSX);

        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);

        logger((memory_get_usage(true)/1024/1024)." MiB, " .(memory_get_peak_usage(true)/1024/1024)." MiB (peak), {$execution_time}sec");

        $countedRows['makeCount'] = Cache::get('makeCount', 0);
        Cache::forget('makeCount');
        $countedRows['modelCount'] = Cache::get('modelCount', 0);
        Cache::forget('modelCount');
        $countedRows['productCount'] = Cache::get('productCount', 0);
        Cache::forget('productCount');

        return $this->index($countedRows);
    }
}
