<?php

namespace App\Imports;

use App\Models\DtDosen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDosen implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection->slice(1) as $row) {
            $data['nip_nik_dosen'] = $row[0];
            $data['nama_dosen'] = $row[1];
            $data['id_prodi'] = $row[2];
            $data['id_jabatan_akademik_dosen'] = $row[3];
            $data['id_pendidikan_terakhir'] = $row[4];
            $data['is_sertifikasi'] = $row[5];
            $data['is_tetap'] = $row[6];

            DtDosen::create($data);
        }
    }
}
