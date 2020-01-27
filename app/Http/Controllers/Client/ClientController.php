<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\MakeModel;
use App\Models\Product;
use App\Models\Type;
use App\Repositories\ClientRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    /**
     * Return client homepage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $makes = Make::all();

        return view('client.catalog.index')->with([
            'sidebarData' => ClientRepository::sidebarData()
        ]);
    }

    /**
     * Return client about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('client.about.index')->with([
            'sidebarData' => ClientRepository::sidebarData()
        ]);
    }

    /**
     * Return client about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('client.contact.index')->with([
            'sidebarData' => ClientRepository::sidebarData()
        ]);
    }

    /**
     * Return models for given make id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getModels()
    {
        $models = MakeModel::where('make_id', request('selectedMake'))
            ->get();

        request()->session()->put('models', $models);
        request()->session()->put('selectedMake', request('selectedMake'));

        request()->session()->forget('types');
        request()->session()->forget('selectedType');

        return response()->json($models);
    }

    /**
     * Return types for given model id.
     *
     * @param int|null $modelId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTypes()
    {
        $types = ClientRepository::getTypes(request('selectedModel'));

        request()->session()->put('types', $types);
        request()->session()->put('selectedModel', request('selectedModel'));

        return response()->json($types);
    }
}
