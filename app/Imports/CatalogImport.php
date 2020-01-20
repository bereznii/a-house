<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class CatalogImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dump(array_slice($row, 0, 10));
        if ($row[0] == 'WS8604GGYM') die;
//        return new Product([
//            //
//        ]);
    }
}
