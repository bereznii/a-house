<?php

namespace App\Imports;

use App\Models\Make;
use App\Models\MakeModel;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CatalogImport implements ToModel, WithChunkReading
{
    private static int $i = 0;

    private string $regex = '/^[A-Z\s\p{Lu}]+$/u'; //regex for uppercase latin and cyrillic chars. Matches car makes

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
        if (preg_match($this->regex, $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) {

            logger($row[2]);

            Cache::put('make', $row[2], 10);

            return new Make([
                'name' => $row[2],
            ]);
        }

        /**
         * MODELS
         */
        if (isset($row[2]) && preg_match($this->regex, $row[2]) == 0 && !isset($row[0]) && !isset($row[1])) {

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

            return new MakeModel([
                'name' => $row[2],
                'make_id' => Cache::get('make_id'),
            ]);
        }

        /**
         * PRODUCTS
         */
        if (isset($row[0]) && isset($row[1]) && isset($row[2]) && Cache::has('make_id')) {
            logger($row[2] . ' -> ' . self::$i++);

            $model = MakeModel::where('name', Cache::get('model'))->first();

            $timestamp = now();

            return new Product([
                'make_id' => Cache::get('make_id'),
                'model_id' => $model->id,
                'type_id' => 82,
                'barcode' => $row[0],
                'stock_code' => $row[1],
                'nomenclature' => $row[2],
                'original_description' => 'to be',
                'detailed_description' => $row[7],
                'in_stock' => $row[4],
                'dealer_price' => $row[5],
                'retail_price' => $row[5],
                'manufacture' => $row[6],
                'updated_at' => $timestamp,
                'created_at' => $timestamp
            ]);
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
