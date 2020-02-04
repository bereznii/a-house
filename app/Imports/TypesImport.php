<?php

namespace App\Imports;

use App\Entities\Type;
use Maatwebsite\Excel\Concerns\ToModel;

class TypesImport implements ToModel
{
    /**
     * @param array $row
     * @return Type|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 2);

        if (isset($row[0]) && isset($row[1])) {
            return new Type([
                'code' => $row[0],
                'translation' => mb_ucfirst($row[1]),
            ]);
        }

        return null;
    }
}
