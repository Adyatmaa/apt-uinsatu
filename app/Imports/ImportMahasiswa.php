<?php

namespace App\Imports;

use App\Models\DataCalonMahasiswa;
use App\Models\DataMahasiswaAktif;
use App\Models\DataMhsAsing;
use App\Models\DataMhsLulus;
use App\Models\DataMhsTugasAkhir;
use App\Models\DetailCalonMahasiswa;
use App\Models\DetailMahasiswaAktif;
use App\Models\DetailMhsAsing;
use App\Models\DetailMhsLulus;
use App\Models\DetailMhsTugasAkhir;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMahasiswa implements ToCollection
{
    protected $statusMahasiswa, $id_tahun, $file;

    public function __construct($statusMahasiswa, $id_tahun, $file)
    {
        $this->statusMahasiswa = $statusMahasiswa;
        $this->id_tahun = $id_tahun;
        $this->file = $file;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        if ($this->statusMahasiswa == 1) {
            $dataCalonMhs = new DataCalonMahasiswa();
            $dataCalonMhs->id_tahun = $this->id_tahun;
            // $dataCalonMhs->bukti = $file;
            $dataCalonMhs->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_calon_mahasiswa'] = $dataCalonMhs->id;
                $detail['id_prodi'] = $row[0];
                $detail['daya_tampung'] = $row[1];
                $detail['pendaftar'] = $row[2];
                $detail['lulus_seleksi'] = $row[3];
                $detail['mhs_registrasi'] = $row[4];
                $detail['mhs_transfer'] = $row[5];

                DetailCalonMahasiswa::create($detail);
            }
        } else if ($this->statusMahasiswa == 2) {

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

                $dataMahasiswaAktif = DataMahasiswaAktif::create($data);

                $detail['id_data_mhs_aktif'] = $dataMahasiswaAktif->id;
                $detail['id_prodi'] = $row[1];
                $detail['jml_mhs_aktif'] = $row[2];
                $detail['jml_mhs_transfer'] = $row[3];

                DetailMahasiswaAktif::create($detail);
            }
        } else if ($this->statusMahasiswa == 3) {

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

                $dataMhsAsing = DataMhsAsing::create($data);

                $detail['id_data_mhs_asing'] = $dataMhsAsing->id;
                $detail['id_prodi'] = $row[1];
                $detail['jml_mhs_asing'] = $row[2];

                DetailMhsAsing::create($detail);
            }
        } else if ($this->statusMahasiswa == 4) {

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

                $dataMhsLulus = DataMhsLulus::create($data);

                $detail['id_data_mhs_lulus'] = $dataMhsLulus->id;
                $detail['id_prodi'] = $row[1];
                $detail['jml_lulusan'] = $row[2];
                $detail['rerata_ipk'] = $row[3];
                $detail['rerata_masa_studi'] = $row[4];

                DetailMhsLulus::create($detail);
            }
        } else if ($this->statusMahasiswa == 5) {
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

                $dataMhsTugasAkhir = DataMhsTugasAkhir::create($data);

                $detail['id_data_mhs_tugas_akhir'] = $dataMhsTugasAkhir->id;
                $detail['id_prodi'] = $row[1];
                $detail['jml_mhs_tugas_akhir'] = $row[2];

                DetailMhsTugasAkhir::create($detail);
            }
        }
    }
}
