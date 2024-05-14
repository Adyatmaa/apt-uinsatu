<?php

namespace App\Imports;

use App\Models\DTendik;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportTendik implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection->slice(1) as $row) {
            $data['nip_nik_tendik'] = $row[0];
            $data['nama_tendik'] = $row[1];
            $data['id_jabatan_tendik'] = $row[2];
            $data['bukti'] = $row[3];
            $data['keterangan'] = $row[4];

            DTendik::create($data);
        }
    }
}
