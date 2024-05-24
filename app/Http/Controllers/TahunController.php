<?php

namespace App\Http\Controllers;

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
use App\Models\MTahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function addTahun(Request $request)
    {
        $tahun = new MTahun();
        $tahun->tahun = $request->tahun;
        $tahun->is_ts = '2024';
        $tahun->save();

        return redirect()->back();
    }

    public function delTahun($id)
    {
        //tabel tahun
        $tahun = MTahun::findOrFail($id);
        $tahun->delete();

        //tabel calon
        $calon = MTahun::with('dataCalonMhs.detailCalonMhs')->findOrFail($id);

        $id_data_calon = $calon->dataCalonMhs->id_data_calon_mahasiswa;
        // dd($id_data_calon);
        $dataCalon = DataCalonMahasiswa::findorFail($id_data_calon);
        $detailCalon = DetailCalonMahasiswa::findOrFail($id_data_calon);

        $dataCalon->delete();
        $detailCalon->delete();

        //tabel aktif
        $aktif = MTahun::with('dataMhsAktif.detailMhsAktif')->findOrFail($id);

        $id_data_aktif = $aktif->dataMhsAktif->id_data_mhs_aktif;

        $dataAktif = DataMahasiswaAktif::findOrFail($id_data_aktif);
        $detailAktif = DetailMahasiswaAktif::findOrFail($id_data_aktif);

        $dataAktif->delete();
        $detailAktif->delete();

        //tabel asing
        $asing = MTahun::with('dataMhsAsing.detailMhsAsing')->findOrFail($id);

        $id_data_asing = $asing->dataMhsAsing->id_data_mhs_asing;

        $dataAsing = DataMhsAsing::findOrFail($id_data_asing);
        $detailAsing = DetailMhsAsing::findOrFail($id_data_asing);

        $dataAsing->delete();
        $detailAsing->delete();

        //tabel lulus
        $lulus = MTahun::with('dataMhsLulus.detailMhsLulus')->findOrFail($id);

        $id_data_lulus = $lulus->dataMhsLulus->id_data_mhs_lulus;

        $dataLulus = DataMhsLulus::findOrFail($id_data_lulus);
        $detailLulus = DetailMhsLulus::findOrFail($id_data_lulus);

        $dataLulus->delete();
        $detailLulus->delete();

        //tabel akhir
        $akhir = MTahun::with('dataMhsAkhir.detailMhsAkhir')->findOrFail($id);

        $id_data_akhir = $akhir->dataMhsAkhir->id_data_mhs_tugas_akhir;

        $dataAkhir = DataMhsTugasAkhir::findOrFail($id_data_akhir);
        $detailAkhir = DetailMhsTugasAkhir::findOrFail($id_data_akhir);

        $dataAkhir->delete();
        $detailAkhir->delete();

        return redirect()->back();
    }
}
