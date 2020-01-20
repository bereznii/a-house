<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class TypesImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        if (!isset($row[3])) {
            return;
        }

        $row = array_slice($row, 0, 10);
        dd($row);
    }
}
