@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Mahasiswa Lulus</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa Lulus</li>
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
                    <h3 class="card-title">Data Mahasiswa Lulus</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Program Studi</th>
                                <th>Jumlah Lulusan</th>
                                <th>Rata-rata IPK</th>
                                <th>Rata-rata Masa Studi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $no = 0;
                        foreach ($mhs as $row) : $no++;
                        ?>
                            <tr>
                                <th><?= $no ?></th>
                                <td><?= $row->id_prodi ?></td>
                                <td><?= $row->jml_lulusan ?></td>
                                <td><?= $row->rerata_ipk ?></td>
                                <td><?= $row->rerata_masa_studi ?></td>
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
