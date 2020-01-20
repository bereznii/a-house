<?php

namespace App\Imports;

use App\Models\Shortcut;
use App\Models\Type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ShortcutsImport implements ToModel
{
    private static int $i = 0;

    /**
     * @param array $row
     * @return Type|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        if (self::$i < 30) {
            self::$i++;
            return null;
        }

        $row = array_slice($row, 0, 10);

        if (isset($row[2]) && isset($row[3])) {
            return new Shortcut([
                'shortcut' => $row[2],
                'meaning' => $row[3],
            ]);
        }

        return null;
    }
}
