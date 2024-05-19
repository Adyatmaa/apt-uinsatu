@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Calon Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Calon Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Calon Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Program Studi</th>
                                <th>Daya Tampung Prodi</th>
                                <th>Jumlah Pendaftar</th>
                                <th>Jumlah Mhs Lulus Seleksi</th>
                                <th>Jumlah Mhs Registrasi</th>
                                <th>Jumlah Mhs Transfer</th>
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
                                <td><?= $row->daya_tampung ?></td>
                                <td><?= $row->pendaftar ?></td>
                                <td><?= $row->lulus_seleksi ?></td>
                                <td><?= $row->mhs_registrasi ?></td>
                                <td><?= $row->mhs_transfer ?></td>
                            </tr>
                            <?php
                        endforeach
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
