<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class TamuUndanganImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $data = [];

        foreach ($collection->skip(1) as $row) { // Skip header
            $data[] = [
                'nama' => $row[1],
                'telepon' => str_replace(' ', '', $row[2]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tamu_undangans')->insert($data);
    }
}
