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
    /**
    * @param array $row
    *
    * @return mixed
    */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 10);


        //models
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

        //make
//        if (preg_match('/^[A-Z\s]+$/', $row[2]) == 1 && !isset($row[0]) && !isset($row[1])) { //make
//            logger($row[2]);
//            return new Make([
//                'name' => $row[2],
//            ]);
//        }


//        if (!isset($row[0])) {
//            return new Product([
//                'make_id' => Cache::get('make_id'),
//                'model_id' => MakeModel::where('name', Cache::get('model'))->first()->id,
//                'type_id' => 1,
//                'barcode' => $row[0],
//                'stock_code' => $row[1],
//                'nomenclature' => $row[2],
//                'original_description' => 'to be',
//                'detailed_description' => $row[6],
//                'in_stock' => $row[3],
//                'dealer_price' => $row[4],
//                'retail_price' => $row[4],
//                'manufacture' => $row[5],
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
