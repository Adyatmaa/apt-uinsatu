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
                            <div class="d-flex align-items-center justify-content-center">
                                <form action="{{ route('addTahun') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group d-flex align-items-end justify-content-center">
                                        <div class="form-group mb-3 mr-4">
                                            <label for="">Tahun</label>
                                            <input type="text" name="tahun" class="form-control"
                                                placeholder="Tambahkan Tahun Baru" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </form>
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
                                                            <td class="d-flex align-items-center justify-content-between">
                                                                <a href="{{ route('pageEditMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                        viewBox="0 -960 960 960" width="24px"
                                                                        fill="#e8eaed">
                                                                        <path
                                                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                                                    </svg>
                                                                </a>
                                                                <a href="{{ route('pageAddMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                        viewBox="0 -960 960 960" width="24px"
                                                                        fill="#e8eaed">
                                                                        <path
                                                                            d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
                                                                    </svg>
                                                                </a>
                                                                <form
                                                                    action="{{ route('delTahun', ['id_tahun' => $row->id_tahun]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            height="24px" viewBox="0 -960 960 960"
                                                                            width="24px" fill="#e8eaed">
                                                                            <path
                                                                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
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
