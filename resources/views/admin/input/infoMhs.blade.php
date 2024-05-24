@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Bukti Data Mahasiswa {{ $tahun->tahun }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pageInputMahasiswa') }}">Input Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Info Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Status Mahasiswa</th>
                                        <th style="width: 40%">Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Calon Mahasiswa</td>
                                        @if (empty($calon->dataCalonMhs->bukti))
                                            <td>Data Belum di Upload</td>
                                        @else
                                            <td>{{ $calon->dataCalonMhs->bukti }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mahasiswa Aktif</td>
                                        @if (empty($calon->dataMhsAktif->bukti))
                                            <td>Data Belum di Upload</td>
                                        @else
                                            <td>{{ $calon->dataMhsAktif->bukti }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mahasiswa Asing</td>
                                        @if (empty($calon->dataMhsAsing->bukti))
                                            <td>Data Belum di Upload</td>
                                        @else
                                            <td>{{ $calon->dataMhsAsing->bukti }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mahasiswa Lulus</td>
                                        @if (empty($calon->dataMhsLulus->bukti))
                                            <td>Data Belum di Upload</td>
                                        @else
                                            <td>{{ $calon->dataMhsLulus->bukti }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mahasiswa Tugas Akhir</td>
                                        @if (empty($calon->dataMhsAkhir->bukti))
                                            <td>Data Belum di Upload</td>
                                        @else
                                            <td>{{ $calon->dataMhsAkhir->bukti }}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
@endsection
