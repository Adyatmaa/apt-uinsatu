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
            $filePath = $this->file->store('public/bukti');
            
            $dataCalonMhs = new DataCalonMahasiswa();
            $dataCalonMhs->id_tahun = $this->id_tahun;
            $dataCalonMhs->bukti = $filePath;
            $dataCalonMhs->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_calon_mahasiswa'] = $dataCalonMhs->id_data_calon_mahasiswa;
                $detail['id_prodi'] = $row[0];
                $detail['daya_tampung'] = $row[1];
                $detail['pendaftar'] = $row[2];
                $detail['lulus_seleksi'] = $row[3];
                $detail['mhs_registrasi'] = $row[4];
                $detail['mhs_transfer'] = $row[5];

                DetailCalonMahasiswa::create($detail);
            }
        } else if ($this->statusMahasiswa == 2) {
            $filePath = $this->file->store('public/bukti');
            
            $dataMhsAktif = new DataMahasiswaAktif();
            $dataMhsAktif->id_tahun = $this->id_tahun;
            $dataMhsAktif->bukti = $filePath;
            $dataMhsAktif->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_mhs_aktif'] = $dataMhsAktif->id_data_mhs_aktif;
                $detail['id_prodi'] = $row[0];
                $detail['jml_mhs_aktif'] = $row[1];
                $detail['jml_mhs_transfer'] = $row[2];

                DetailMahasiswaAktif::create($detail);
            }
        } else if ($this->statusMahasiswa == 3) {
            $filePath = $this->file->store('public/bukti');

            $dataMhsAsing = new DataMhsAsing();
            $dataMhsAsing->id_tahun = $this->id_tahun;
            $dataMhsAsing->bukti = $filePath;
            $dataMhsAsing->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_mhs_asing'] = $dataMhsAsing->id_data_mhs_asing;
                $detail['id_prodi'] = $row[0];
                $detail['jml_mhs_asing'] = $row[1];

                DetailMhsAsing::create($detail);
            }
        } else if ($this->statusMahasiswa == 4) {
            $filePath = $this->file->store('public/bukti');
            
            $dataMhsLulus = new DataMhsLulus();
            $dataMhsLulus->id_tahun = $this->id_tahun;
            $dataMhsLulus->bukti = $filePath;
            $dataMhsLulus->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_mhs_lulus'] = $dataMhsLulus->id_data_mhs_lulus;
                $detail['id_prodi'] = $row[0];
                $detail['jml_lulusan'] = $row[1];
                $detail['rerata_ipk'] = $row[2];
                $detail['rerata_masa_studi'] = $row[3];

                DetailMhsLulus::create($detail);
            }
        } else if ($this->statusMahasiswa == 5) {
            $filePath = $this->file->store('public/bukti');
            
            $dataMhsTugasAkhir = new DataMhsTugasAkhir();
            $dataMhsTugasAkhir->id_tahun = $this->id_tahun;
            $dataMhsTugasAkhir->bukti = $filePath;
            $dataMhsTugasAkhir->save();

            foreach ($collection->slice(1) as $row) {

                $detail['id_data_mhs_tugas_akhir'] = $dataMhsTugasAkhir->id_data_mhs_tugas_akhir;
                $detail['id_prodi'] = $row[0];
                $detail['jml_mhs_tugas_akhir'] = $row[1];

                DetailMhsTugasAkhir::create($detail);
            }
        } else {
            return redirect(route('pageInputMahasiswa'));
        }
    }
}
