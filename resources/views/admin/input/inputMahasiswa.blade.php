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
                                                                <a href="{{ route('pageInfoMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                        viewBox="0 -960 960 960" width="24px"
                                                                        fill="#e8eaed">
                                                                        <path
                                                                            d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                                    </svg>
                                                                </a>
                                                                {{-- <a href="{{ route('pageEditMahasiswa', ['id_tahun' => $row->id_tahun]) }}"
                                                                    class="btn btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                        viewBox="0 -960 960 960" width="24px"
                                                                        fill="#e8eaed">
                                                                        <path
                                                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                                                    </svg>
                                                                </a> --}}
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
                                                                    method="POST" class="align-items-center">
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

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
