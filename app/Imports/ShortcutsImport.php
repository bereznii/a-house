<?php

namespace App\Imports;

use App\Models\Shortcut;
use App\Models\Type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ShortcutsImport implements ToModel
{
    /**
     * @param array $row
     * @return Type|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        $row = array_slice($row, 0, 2);

        if (isset($row[0]) && isset($row[1])) {
            return new Shortcut([
                'shortcut' => $row[0],
                'meaning' => $row[1],
            ]);
        }

        return null;
    }
}
