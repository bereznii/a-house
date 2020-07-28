<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\CallbackRequestRepository;
use App\Services\ClientService;
use App\Services\MetaDataService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    private ClientService $clientService;

    /**
     * @var CallbackRequestRepository
     */
    private CallbackRequestRepository $callbackRequestRepository;

    /**
     * @var MetaDataService
     */
    private MetaDataService $metaDataService;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     * @param CallbackRequestRepository $callbackRequestRepository
     * @param MetaDataService $metaDataService
     */
    public function __construct(
        ClientService $clientService,
        CallbackRequestRepository $callbackRequestRepository,
        MetaDataService $metaDataService
    )
    {
        $this->clientService = $clientService;
        $this->callbackRequestRepository = $callbackRequestRepository;
        $this->metaDataService = $metaDataService;
    }

    /**
     * Return client homepage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('client.catalog.index')->with([
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('catalog')
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
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('about')
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
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('contact')
        ]);
    }

    /**
     * Return models for given make id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getModels()
    {
        $validatedData = request()->validate([
            'selectedMake' => 'required|numeric'
        ]);

        $models = $this->clientService->getModelsByMakeId($validatedData['selectedMake']);

        request()->session()->put('models', $models);
        request()->session()->put('selectedMake', request('selectedMake'));

        request()->session()->forget('types');
        request()->session()->forget('selectedType');

        return response()->json($models);
    }

    /**
     * Return types for given model id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTypes()
    {
        $validatedData = request()->validate([
            'selectedModel' => 'required|numeric'
        ]);

        $types = $this->clientService->getTypesByModelId($validatedData['selectedModel']);

        request()->session()->put('types', $types);
        request()->session()->put('selectedModel', request('selectedModel'));

        return response()->json($types);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCallback(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'comment' => 'max:10000',
        ]);

        $result = $this->callbackRequestRepository->saveCallbackRequest($validatedData);

        return response()->json(['status' => $result]);
    }
}
