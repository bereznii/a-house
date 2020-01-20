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

    /**
    * @param array $row
    *
    * @return mixed
    */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 10);

        /**
         * MODELS
         */
//        if (preg_match('/^[A-Z\s]+$/u', $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) {
//
//            $make = Make::where('name', $row[2])->first();
//            if (isset($make)) {
//                $make_id = $make->id;
//                Cache::put('make_id', $make_id, 5);
//            }
//
//            return null;
//        }
//
//        if (isset($row[2]) && preg_match('/^[A-Z\s]+$/u', $row[2]) == 0 && !isset($row[0]) && !isset($row[1])) {
//
//            if (!Cache::has('make_id')) {
//                logger('return null for ' . $row[2]);
//                return null;
//            }
//
//            return new MakeModel([
//                'name' => $row[2],
//                'make_id' => Cache::get('make_id'),
//            ]);
//        }

        /**
         * MAKES
         */
        //        if (preg_match('/^[A-Z\s]+$/', $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) { //make
//            logger($row[2]);
//            return new Make([
//                'name' => $row[2],
//            ]);
//        }


        /**
         * PRODUCTS
         */
//        if (preg_match('/^[A-Z\s]+$/u', $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) {
//
//            $make = Make::where('name', $row[2])->first();
//            if (isset($make)) {
//                $make_id = $make->id;
//                Cache::put('make_id', $make_id, 10);
//            }
//
//            return null;
//        }
//
//        if (isset($row[2]) && preg_match('/^[A-Z\s]+$/u', $row[2]) == 0 && !isset($row[0]) && !isset($row[1])) {
//
//            if (!Cache::has('make_id')) {
//                logger('return null for ' . $row[2]);
//                return null;
//            }
//
//            $model = MakeModel::where('name', $row[2])->first();
//            if (isset($model)) {
//                $model_id = $model->id;
//                Cache::put('model_id', $model_id, 10);
//            }
//
//            return null;
//        }
//        if (isset($row[0]) && isset($row[1]) && isset($row[2]) && Cache::has('make_id') && Cache::has('model_id')) {
//            logger(self::$i++);
//
//            $timestamp = now();
//
//            return new Product([
//                'make_id' => Cache::get('make_id'),
//                'model_id' => Cache::get('model_id'),
//                'type_id' => 1,
//                'barcode' => $row[0],
//                'stock_code' => $row[1],
//                'nomenclature' => $row[2],
//                'original_description' => 'to be',
//                'detailed_description' => $row[7],
//                'in_stock' => $row[4],
//                'dealer_price' => $row[5],
//                'retail_price' => $row[5],
//                'manufacture' => $row[6],
//                'updated_at' => $timestamp,
//                'created_at' => $timestamp
//            ]);
//        }

        return null;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 50;
    }
}
