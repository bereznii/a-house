<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\MakeModel;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

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
            'makes' => $makes
        ]);
    }

    /**
     * Return client item page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function item()
    {
        return view('client.item.index');
    }

    /**
     * Return client about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('client.about.index');
    }

    /**
     * Return client about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('client.contact.index');
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

        return response()->json($models);
    }

    /**
     * Return types for given model id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTypes()
    {
        $typesForModel = Product::select('type_id')
            ->where('model_id', request('selectedModel'))
            ->where('in_stock', '>', 0)
            ->groupBy('type_id')
            ->get()
            ->pluck('type_id')
            ->toArray();

        $types = Type::whereIn('id' , $typesForModel)->get();

        return response()->json($types);
    }
}
