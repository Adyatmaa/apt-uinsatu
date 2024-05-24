@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pageInputMahasiswa') }}">Input Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Add Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Mahasiswa</h3>
                    </div>
                    <form action="{{ route('mahasiswa.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <p>Silahkan input data mahasiswa per prodi sesusai dengan template
                                    yang telah tersedia</p>
                                <p>Unduh template <a href="{{ asset('assets/file/template-mhs.zip') }}">disini</a></p>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun</label>
                                <div class="form-group">
                                    <select class="custom-select rounded-1" id="exampleSelectRounded0" name="id_tahun"
                                        style="background-color: white; color: black">
                                        <option value="{{ $calon->id_tahun }}">{{ $calon->tahun }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status Mahasiswa</label>
                                <div class="form-group">

                                    <select class="custom-select rounded-1" id="exampleSelectRounded0"
                                        name="statusMahasiswa" required>
                                        @if ($calon->dataCalonMhs == null)
                                            <option value="1">Calon Mahasiswa</option>
                                        @else
                                        @endif
                                        @if ($aktif->dataMhsAktif == null)
                                            <option value="2">Mahasiswa Aktif</option>
                                        @else
                                        @endif
                                        @if ($asing->dataMhsAsing == null)
                                            <option value="3">Mahasiswa Asing</option>
                                        @else
                                        @endif
                                        @if ($lulus->dataMhsLulus == null)
                                            <option value="4">Sudah Lulus</option>
                                        @else
                                        @endif
                                        @if ($akhir->dataMhsAkhir == null)
                                            <option value="5">Sedang Menjalani Tugas Akhir</option>
                                        @else
                                        @endif
                                        @if (
                                            $calon->dataCalonMhs != null &&
                                                $aktif->dataMhsAktif != null &&
                                                $asing->dataMhsAsing != null &&
                                                $lulus->dataMhsLulus != null &&
                                                $akhir->dataMhsAkhir != null)
                                            <option value="6" aria-readonly="true">Semua Data di Tahun ini Telah di
                                                Upload
                                            </option>
                                        @else
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file">File bukti (.pdf)</label>
                                <div class="input-group w-auto">
                                    <div class="custom-file w-auto">
                                        <input type="file" accept=".pdf" class="custom-file-input" name="bukti"
                                            id="file">
                                        <label class="custom-file-label" for="exampleInputFile">Tambahkan File
                                            Bukti</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept=".csv" class="custom-file-input" id="exampleInputFile"
                                            name="file" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="mb-3" for="">*Catatan</label>
                                <p>Sebelum mengupload Data Mahasiswa, Harap upload data <a
                                        href="{{ route('pageInputProdi') }}">Prodi</a> terlebih dahulu</p>
                                <p>Untuk melihat ID dari Fakultas dan Jenjang, Silahkan ke halaman <a
                                        href="{{ route('pageDataFakultas') }}">Fakultas</a> dan <a
                                        href="pageDataJenjang">Jenjang</a></p>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            @if (
                                $calon->dataCalonMhs != null &&
                                    $aktif->dataMhsAktif != null &&
                                    $asing->dataMhsAsing != null &&
                                    $lulus->dataMhsLulus != null &&
                                    $akhir->dataMhsAkhir != null)
                                <a href="{{ route('pageInputMahasiswa') }}" class="btn btn-danger">Kembali</a>
                            @else
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
