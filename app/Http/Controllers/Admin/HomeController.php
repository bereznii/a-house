<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Make;
use App\Entities\Product;
use App\Exports\CatalogExport;
use App\Http\Controllers\Controller;
use App\Imports\Import;
use App\Entities\CallbackRequest;
use App\Repositories\CallbackRequestRepository;
use App\Services\ImportService;
use Carbon\Carbon;
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
     * @param CallbackRequestRepository $callbackRequestRepository
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
    public function index(array $countedRows = null, ?array $importErrors = null)
    {
        return view('admin.pages.import')->with([
            'countedRows' => $countedRows,
            'importErrors' => $importErrors
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
    public function exportForAutopro()
    {
        return view('admin.pages.autopro', [
            'makes' => Make::all()->pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * @return \Maatwebsite\Excel\BinaryFileResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function downloadAutoproCatalog()
    {
        $type = request('reportType');

        switch ($type) {
            case 'all_products':
                $products = Product::where('in_stock', '!=', 0)->get();
                break;
            case 'only_original_products':
                $products = Product::where('in_stock', '!=', 0)->whereNotNull('original_code')->get();
                break;
            case 'specific_make_products':
                $products = Product::whereIn('make_id', request('make', []))
                    ->where('in_stock', '!=', 0)
                    ->orderBy('stock_code', 'ASC')
                    ->get();
                break;
        }

        return Excel::download(new CatalogExport($products), 'catalog.xls');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function import()
    {
        $time_start = microtime(true);

        ini_set('memory_limit', '128M');
        ini_set('max_execution_time', '90');

        $import = new Import();
        $import->onlySheets(0);

        Excel::import($import, request()->file('catalog'), null, \Maatwebsite\Excel\Excel::XLS);
        $countedRows['vendorCodeCount'] = app(ImportService::class)->generateVendorCodes();

        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);

        logger((memory_get_usage(true)/1024/1024)." MiB, " .(memory_get_peak_usage(true)/1024/1024)." MiB (peak), {$execution_time}sec");

        $countedRows['makeCount'] = Cache::get('makeCount', 0);
        Cache::forget('makeCount');
        $countedRows['modelCount'] = Cache::get('modelCount', 0);
        Cache::forget('modelCount');
        $countedRows['productCount'] = Cache::get('productCount', 0);
        Cache::forget('productCount');

        $importErrors = Cache::get('errors');
        Cache::forget('errors');

        //Soft delete products, that were last updated more than 5 min ago
        $oldProductsTime = Carbon::now()
            ->subMinutes(5)
            ->format('Y-m-d H:i:s');
        Product::where('updated_at', '<', $oldProductsTime)->delete();

        return $this->index($countedRows,$importErrors);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog()
    {
        $products = Product::orderBy('id', 'desc')->paginate(50);

        return view('admin.pages.products.index')->with([
            'products' => $products,
        ]);
    }
}
