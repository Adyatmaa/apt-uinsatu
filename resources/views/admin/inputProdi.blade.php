@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Input Data Prodi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Input Prodi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Prodi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('prodi.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <p>Silahkan input data mahasiswa per prodi sesusai dengan <a
                                        href="{{ asset('assets/file/template-prodi.csv') }}">template</a>
                                    yang telah tersedia</p>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input (.csv)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept=".csv" class="custom-file-input" name="file"
                                            id="file" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="">*Catatan</label>
                                <p>Untuk melihat ID dari Fakultas dan Jenjang, Silahkan ke halaman <a
                                        href="{{ route('pageDataFakultas') }}">Fakultas</a> dan <a
                                        href="{{ route('pageDataJenjang') }}">Jenjang</a></p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
