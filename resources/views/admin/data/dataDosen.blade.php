@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Dosen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Dosen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Dosen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>NIK Dosen</th>
                                <th>Nama Dosen</th>
                                <th>Program Studi</th>
                                <th>Jabatan Akademik Dosen</th>
                                <th>Pendidikan Terakhir Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $no = 0;
                        foreach ($dosen as $row) : $no++;
                        ?>
                            <tr>
                                <th><?= $no ?></th>
                                <td><?= $row->nip_nik_dosen ?></td>
                                <td><?= $row->nama_dosen ?></td>
                                <td><?= $row->prodi->nama_prodi ?></td>
                                <td><?= $row->jabatanAkademik->jabatan_akademik_dosen ?></td>
                                <td><?= $row->pendidikanTerakhir->pendidikan_terakhir ?></td>
                            </tr>
                            <?php
                        endforeach
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
