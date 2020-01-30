<?php

namespace App\Repositories;


use App\Models\CallbackRequest;
use App\Models\Make;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository
{
    public static function sidebarData()
    {
        if (!request()->session()->has('makes')) {
            $makes = Make::all();
        }

        $selectedMake = request()->session()->get('selectedMake', null);

        $models = request()->session()->get('models', null);
        $selectedModel = request()->session()->get('selectedModel', null);

        if (empty($selectedModel) && (isset($models) && $models->count() > 0)) {
            $types = self::getTypes($models->first()->id);
        } elseif (isset($selectedModel)) {
            $types = self::getTypes($selectedModel);
        } else {
            $types = request()->session()->get('types', null);
        }

        $selectedType = request()->session()->get('selectedType', null);

        $cartCount = count(request()->session()->get('cart', []));

        return [
            'makes' => [
                'list' => $makes,
                'selectedId' => $selectedMake
            ],
            'models' => [
                'list' => $models,
                'selectedId' => $selectedModel
            ],
            'types' => [
                'list' => $types,
                'selectedId' => $selectedType
            ],
            'cartCount' => $cartCount
        ];
    }

    /**
     * Return types for given model id.
     *
     * @param $modelId
     * @return \Illuminate\Support\Collection
     */
    public static function getTypes($modelId)
    {
        $typesForModel = Product::select('type_id')
            ->where('model_id', $modelId)
            ->where('in_stock', '>', 0)
            ->groupBy('type_id')
            ->get()
            ->pluck('type_id')
            ->toArray();

        $types = Type::whereIn('id' , $typesForModel)->get();

        return $types;
    }

    /**
     * @param array $request
     * @return bool
     */
    public static function saveCallbackRequest(array $data): bool
    {
        $record = app(CallbackRequest::class);
        $record->name = $data['name'] ?? '';
        $record->phone = $data['phone'] ?? '';
        $record->comment = $data['comment'] ?? '';
        $record->save();

        return true;
    }
}
