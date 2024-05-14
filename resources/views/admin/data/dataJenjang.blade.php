@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Jenjang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Jenjang</li>
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
                    <h3 class="card-title">Data Jenjang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10%">ID Jenjang</th>
                                <th>Nama Jenjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $no = 0;
                        foreach ($jenjang as $row) : $no++;
                        ?>
                            <tr>
                                <th class="flex text-center"><?= $row->id_jenjang ?></th>
                                <td><?= $row->nama_jenjang ?></td>
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
