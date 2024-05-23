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

                    <div class="card-body">
                        <div class="form-group">
                            <p>Silahkan input data mahasiswa per prodi sesusai dengan template
                                yang telah tersedia</p>
                            <p>Unduh template <a href="{{ asset('assets/file/template-mhs.zip') }}">disini</a></p>

                        </div>
                        <div class="form-group">
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <input type="text" class="form-control w-auto mr-4" placeholder="Tambahkan Tahun Baru">
                                <a href="" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%">No</th>
                                                        <th>Tahun</th>
                                                        <th style="width: 20%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    ?>
                                                    @foreach ($tahun as $row)
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td>{{ $row->tahun }}</td>
                                                            <td>
                                                                <a href="{{ route('pageEditMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-primary">
                                                                    <span>Edit</span>
                                                                </a>
                                                                <a href="{{ route('pageAddMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-success">
                                                                    <span>Add</span>
                                                                </a>
                                                                <a href="" class="btn btn-danger">
                                                                    <span>Delete</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            {{-- form --}}
                        </div>
                        {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Status Mahasiswa</label>
                                <div class="form-group">
    
                                    <select class="custom-select rounded-1" id="exampleSelectRounded0" name="statusMahasiswa">
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
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun</label>

                                <div class="form-group">

                                    <select class="custom-select rounded-1" id="exampleSelectRounded0"
                                        name="statusMahasiswa">
                                        <option value="1">2020</option>
                                        <option value="2">2021</option>
                                        <option value="3">2022</option>
                                        <option value="4">2023</option>
                                        <option value="5">2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="mb-3" for="">*Catatan</label>
                                <p>Sebelum mengupload Data Mahasiswa, Harap upload data <a
                                        href="{{ route('pageInputProdi') }}">Prodi</a> terlebih dahulu</p>
                                <p>Untuk melihat ID dari Fakultas dan Jenjang, Silahkan ke halaman <a
                                        href="{{ route('pageDataFakultas') }}">Fakultas</a> dan <a
                                        href="pageDataJenjang">Jenjang</a></p>
                            </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
