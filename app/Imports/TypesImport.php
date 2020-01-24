<?php

namespace App\Imports;

use App\Models\Type;
use App\Repositories\ImportRepository;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
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
                'translation' => ImportRepository::mb_ucfirst($row[1]),
            ]);
        }

        return null;
    }
}
