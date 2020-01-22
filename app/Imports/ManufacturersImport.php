<?php

namespace App\Imports;

use App\Models\ManufacturerCharge;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ManufacturersImport implements ToModel
{
    /**
     * @param array $row
     * @return ManufacturerCharge|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 8);

        if (isset($row[0]) && isset($row[1]) && isset($row[2])  && isset($row[6])) {

            if ($row[6] == 'Производитель') {
                return null;
            }

            ManufacturerCharge::firstOrCreate(
                [
                    'name' => $row[6]
                ]
            );

        }

        return null;
    }
}
