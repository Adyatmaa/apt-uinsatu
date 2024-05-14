<?php

namespace App\Imports;

use App\Models\DataCalonMahasiswa;
use App\Models\DetailCalonMahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMahasiswa implements ToCollection
{
    protected $statusMahasiswa;

    public function __construct($statusMahasiswa)
    {
        $this->statusMahasiswa = $statusMahasiswa;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        if ($this->statusMahasiswa == 1) {
            foreach ($collection->slice(1) as $row) {
                switch ($row[0]) {
                    case '2020':
                        $data['id_tahun'] = 1;
                        break;
                    case '2021':
                        $data['id_tahun'] = 2;
                        break;
                    case '2022':
                        $data['id_tahun'] = 3;
                        break;
                    case '2023':
                        $data['id_tahun'] = 4;
                        break;
                    case '2024':
                        $data['id_tahun'] = 5;
                        break;
                    default:
                        $data['id_tahun'] = 'null';
                        break;
                }

                $dataCalonMahasiswa = DataCalonMahasiswa::create($data);

                $detail['id_data_calon_mahasiswa'] = $dataCalonMahasiswa->id;
                $detail['id_prodi'] = $row[1];
                $detail['daya_tampung'] = $row[2];
                $detail['pendaftar'] = $row[3];
                $detail['lulus_seleksi'] = $row[4];
                $detail['mhs_registrasi'] = $row[5];
                $detail['mhs_transfer'] = $row[6];

                DetailCalonMahasiswa::create($detail);
            }
        }
    }
}
