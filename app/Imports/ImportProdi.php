<?php

namespace App\Imports;

use App\Models\MProdi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportProdi implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection->slice(1) as $row) {
            $data['nama_prodi'] = $row[0];
            $data['id_jenjang'] = $row[1];
            $data['id_fakultas'] = $row[2];
            $data['sk_pendirian'] = $row[3];
            $data['id_akreditasi'] = $row[4];
            $data['bukti_akreditas'] = $row[5];

            MProdi::create($data);
        }
    }
}
