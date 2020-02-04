<?php

namespace App\Imports;

use App\Entities\Make;
use App\Entities\MakeModel;
use App\Entities\Product;
use App\Services\ImportService;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CatalogImport implements ToModel, WithChunkReading
{
    /**
     * @var int
     */
    private static int $i = 0;

    const REGEX = '/^[A-Z\s\p{Lu}\/]+$/u'; //regex for uppercase latin and cyrillic chars. Matches car makes

    /**
    * @param array $row
    *
    * @return mixed
    */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 10);

        /**
         * MAKES
         */
        if (preg_match(self::REGEX, $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) {

            logger($row[2]);

            if ($row[2] == 'РАСХОДНЫЕ МАТЕРИАЛЫ') {
                Cache::forget('make');
                Cache::forget('make_id');
                return null;
            }

            Cache::put('make', $row[2], 10);

            Make::updateOrCreate(
                [
                    'name' => $row[2]
                ]
            );

            $makeCount = Cache::get('makeCount', 0);
            Cache::put('makeCount', $makeCount+1, 10);

            return null;
        }

        /**
         * MODELS
         */
        if (isset($row[2]) && preg_match(self::REGEX, $row[2]) == 0 && !isset($row[0]) && !isset($row[1])) {

            $make = Make::where('name', Cache::get('make'))->first();
            if (isset($make)) {
                Cache::put('make_id', $make->id, 10);
            }

            if (!Cache::has('make_id')) {
                logger('return null for ' . $row[2]);
                return null;
            }
            Cache::put('model', $row[2], 10);

            logger($row[2]);

            MakeModel::firstOrCreate(
                [
                    'name' => $row[2],
                    'make_id' => Cache::get('make_id')
                ]
            );

            $modelCount = Cache::get('modelCount', 0);
            Cache::put('modelCount', $modelCount+1, 10);

            return null;
        }

        /**
         * PRODUCTS
         */
        if (isset($row[0]) && isset($row[1]) && isset($row[2]) && Cache::has('make_id')) {
            logger($row[2] . ' -> ' . self::$i++);

            $model = MakeModel::where('name', Cache::get('model'))->first();

            Product::updateOrCreate(
                [
                    'barcode' => $row[0],
                    'manufacture' => $row[6],
                    'stock_code' => $row[1]
                ],
                [
                    'make_id' => Cache::get('make_id'),
                    'model_id' => $model->id,
                    'type_id' => ImportService::getProductTypeId($row[2]),
                    'nomenclature' => $row[2],
                    'original_description' => ImportService::getOriginalDescription($row[2]),
                    'detailed_description' => $row[7],
                    'translated_description' => ImportService::getTranslatedDescription($row[2]),
                    'in_stock' => $row[4],
                    'dealer_price' => $row[5],
                    'retail_price' => ImportService::calculateRetailPriceWithCharge($row)
                ]
            );

            $productCount = Cache::get('productCount', 0);
            Cache::put('productCount', $productCount+1, 10);

            return null;
        }

        return null;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
