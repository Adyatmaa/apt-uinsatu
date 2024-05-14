<?php

namespace App\Http\Controllers;

use App\Models\jabatan_aka_dsn;
use App\Models\MFakultas;
use App\Models\MJabatan_aka_dsn;
use App\Models\MJabatan_tendik;
use App\Models\MJenjang;
use App\Models\MPendidikan_terakhir;
use App\Models\MProdi;
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
        return view('admin.inputProdi', compact('faculty'));
    }

    function pageInputMahasiswa()
    {
        $prodi = MProdi::all();
        return view('admin.inputMahasiswa', compact('prodi'));
    }

    function pageInputTendik()
    {
        return view('admin.inputTendik');
    }

    function pageInputDosen()
    {
        return view('admin.inputDosen');
    }

    function pageDataFakultas()
    {
        $faculty = MFakultas::all();
        return view('admin.dataFakultas', compact('faculty'));
    }

    function pageDataJenjang()
    {
        $jenjang = MJenjang::all();
        return view('admin.dataJenjang', compact('jenjang'));
    }

    function pageDataJbTendik()
    {
        $jabatan = MJabatan_tendik::all();
        return view('admin.dataJbTendik', compact('jabatan'));
    }

    function pageDataJbAkaDsn()
    {
        $jabatan = MJabatan_aka_dsn::all();
        return view('admin.dataJbatanAkadDosen', compact('jabatan'));
    }

    function pageDataPendAkhir()
    {
        $pendidikan = MPendidikan_terakhir::all();
        return view('admin.dataPendidikanTerakhir', compact('pendidikan'));
    }

    function pageDataProdi()
    {
        $prodi = MProdi::with(['jenjang', 'fakultas', 'akreditasi'])->get();
        // dd($prodi);
        return view('admin.dataProdi', compact('prodi'));
    }
}
