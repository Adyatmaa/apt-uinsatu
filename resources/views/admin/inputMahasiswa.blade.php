@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Input Data Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Input Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('mahasiswa.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <p>Silahkan input data mahasiswa per prodi sesusai dengan template
                                    yang telah tersedia</p>
                                <p>Unduh template <a href="{{ asset('assets/file/mhs.zip') }}">disini</a></p>
                                <label for="exampleInputPassword1">Prodi</label>
                                <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                                <div class="form-group">
                                    <!-- <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label> -->
                                    <select class="custom-select rounded-1" id="exampleSelectRounded0">
                                        @foreach ($prodi as $row)
                                            <option value="{{ $row->id_prodi }}">{{ $row->nama_prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status Mahasiswa</label>
                                <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                                <div class="form-group">
                                    <!-- <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label> -->
                                    <select class="custom-select rounded-1" id="exampleSelectRounded0"
                                        name="statusMahasiswa">
                                        <option value="1">Calon Mahasiswa</option>
                                        <option value="2">Mahasiswa Aktif</option>
                                        <option value="3">Mahasiswa Asing</option>
                                        <option value="4">Sudah Lulus</option>
                                        <option value="5">Sedang Menjalani Tugas Akhir</option>
                                    </select>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
