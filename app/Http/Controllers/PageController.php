<?php

namespace App\Http\Controllers;

use App\Models\DataCalonMahasiswa;
use App\Models\DetailCalonMahasiswa;
use App\Models\DetailMahasiswaAktif;
use App\Models\DetailMhsAsing;
use App\Models\DetailMhsLulus;
use App\Models\DetailMhsTugasAkhir;
use App\Models\DtDosen;
use App\Models\DTendik;
use App\Models\jabatan_aka_dsn;
use App\Models\MFakultas;
use App\Models\MJabatan_aka_dsn;
use App\Models\MJabatan_tendik;
use App\Models\MJenjang;
use App\Models\MPendidikan_terakhir;
use App\Models\MProdi;
use App\Models\MTahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard');
    }

    function register()
    {
        return view('admin.register');
    }

    function adReg(Request  $request)
    {
        $user = new User();
        $user->nama_user = $request->name;
        $user->email = $request->email;
        $user->is_admin = 1;
        $user->created_by = 1;
        $user->create_date = now();
        $user->updated_by = 1;
        $user->updated_date = now();
        $user->save();

        return redirect('/');
    }

    function login()
    {
        return view('admin.login');
    }

    function adLoggingIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, coba melakukan otentikasi
        if ($user = $this->customAuth($request->only(['nama_user', 'email']))) {
            // Jika otentikasi berhasil, simpan informasi pengguna ke sesi
            session(['user' => $user]);

            // Arahkan pengguna ke halaman "dashboard"
            return redirect('dashboard');
        } else {
            // Jika otentikasi gagal, arahkan pengguna kembali ke halaman awal
            return redirect('/');
        }
    }

    private function customAuth($credentials)
    {
        // Implement your custom authentication logic here
        // For example, you can try to find a user by 'nama_user' and 'email' fields
        // and return the user if found, otherwise return null
        return User::where('nama_user', $credentials['nama_user'])
            ->where('email', $credentials['email'])
            ->first();
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('logout', 'You have logged out');
    }

    function pageInputProdi()
    {
        $faculty = MFakultas::all();
        return view('admin.input.inputProdi', compact('faculty'));
    }

    function pageInputMahasiswa()
    {
        $tahun = MTahun::all();

        return view('admin.input.inputMahasiswa', compact('tahun'));
    }

    function pageInfoMahasiswa($id)
    {
        $tahun = MTahun::findOrFail($id);
        $calon = MTahun::with('dataCalonMhs')->findOrFail($id);
        $aktif = MTahun::with('dataMhsAktif')->findOrFail($id);
        $asing = MTahun::with('dataMhsAsing')->findOrFail($id);
        $lulus = MTahun::with('dataMhsLulus')->findOrFail($id);
        $akhir = MTahun::with('dataMhsAkhir')->findOrFail($id);
        $status = ['Calon Mahasiswa', 'Mahasiswa Aktif', 'Mahasiswa Asing', 'Mahasiswa Lulus', 'Mahasiswa Tugas Akhir'];

        return view('admin.input.infoMhs', compact('tahun', 'calon', 'aktif', 'asing', 'lulus', 'akhir', 'status'));
    }

    function pageEditMahasiswa($id)
    {
        $tahun = MTahun::findOrFail($id);
        return view('admin.input.editMhs', compact('tahun'));
    }

    function pageAddMahasiswa($id)
    {
        // $tahun = MTahun::findOrFail($id);
        $calon = MTahun::with('dataCalonMhs.detailCalonMhs')->findOrFail($id);
        $aktif = MTahun::with('dataMhsAktif.detailMhsAktif')->findOrFail($id);
        $asing = MTahun::with('dataMhsAsing.detailMhsAsing')->findOrFail($id);
        $lulus = MTahun::with('dataMhsLulus.detailMhsLulus')->findOrFail($id);
        $akhir = MTahun::with('dataMhsAkhir.detailMhsAkhir')->findOrFail($id);
        // dd($calon->dataCalonMhs->detailCalonMhs);
        return view('admin.input.addMhs', compact('calon', 'aktif', 'asing', 'lulus', 'akhir'));
    }

    function pageInputTendik()
    {
        return view('admin.input.inputTendik');
    }

    function pageInputDosen()
    {
        return view('admin.input.inputDosen');
    }

    function pageDataFakultas()
    {
        $faculty = MFakultas::all();
        return view('admin.data.dataFakultas', compact('faculty'));
    }

    function pageDataTendik()
    {
        $tendik = DTendik::with('jabatanTendik')->get();
        return view('admin.data.dataTendik', compact('tendik'));
    }

    function pageDataDosen()
    {
        $dosen = DtDosen::with(['prodi', 'jabatanAkademik'])->get();
        return view('admin.data.dataDosen', compact('dosen'));
    }

    function pageDataJenjang()
    {
        $jenjang = MJenjang::all();
        return view('admin.data.dataJenjang', compact('jenjang'));
    }

    function pageDataJbTendik()
    {
        $jabatan = MJabatan_tendik::all();
        return view('admin.data.dataJbTendik', compact('jabatan'));
    }

    function pageDataJbAkaDsn()
    {
        $jabatan = MJabatan_aka_dsn::all();
        return view('admin.data.dataJbatanAkadDosen', compact('jabatan'));
    }

    function pageDataPendAkhir()
    {
        $pendidikan = MPendidikan_terakhir::all();
        return view('admin.data.dataPendidikanTerakhir', compact('pendidikan'));
    }

    function pageDataProdi()
    {
        $prodi = MProdi::with(['jenjang', 'fakultas', 'akreditasi'])->get();
        return view('admin.data.dataProdi', compact('prodi'));
    }

    function pageDataCalonMhs()
    {
        $mhs = DetailCalonMahasiswa::all();
        return view('admin.data.mhs.dataCalonMhs', compact('mhs'));
    }

    function pageDataMhsAktif()
    {
        $mhs = DetailMahasiswaAktif::all();
        return view('admin.data.mhs.dataMhsAktif', compact('mhs'));
    }

    function pageDataMhsAsing()
    {
        $mhs = DetailMhsAsing::all();
        return view('admin.data.mhs.dataMhsAsing', compact('mhs'));
    }

    function pageDataMhsLulus()
    {
        $mhs = DetailMhsLulus::all();
        return view('admin.data.mhs.dataMhsLulus', compact('mhs'));
    }

    function pageDataMhsTgsAkhir()
    {
        $mhs = DetailMhsTugasAkhir::all();
        return view('admin.data.mhs.dataMhsTugasAkhir', compact('mhs'));
    }
}
