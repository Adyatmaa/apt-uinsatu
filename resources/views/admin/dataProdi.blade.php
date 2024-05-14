@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Program Studi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Program Studi</li>
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
                    <h3 class="card-title">Data Program Studi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 6%">ID Program Studi</th>
                                <th class="text-center">Nama Program Studi</th>
                                <th class="text-center">Jenjang</th>
                                <th class="text-center">Fakultas</th>
                                <th class="text-center">Akreditasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $no = 0;
                        foreach ($prodi as $row) : $no++;
                        ?>
                            <tr>
                                <th class="text-center"><?= $row->id_prodi ?></th>
                                <td><?= $row->nama_prodi ?></td>
                                <td><?= $row->jenjang->nama_jenjang ?></td>
                                <td><?= $row->fakultas->nama_fakultas ?></td>
                                <td><?= $row->akreditasi->akreditasi ?></td>
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
