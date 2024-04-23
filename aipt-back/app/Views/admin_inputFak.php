<base href="<?= base_url("assets") ?>/">

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Fakultas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Fakultas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Input Data Fakultas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="<?= site_url('Home/insertFak')?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fakultas</label>
                            <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas" placeholder="Nama Fakultas">
                            <input type="hidden" class="form-control" id="created_by" name="created_by" placeholder="Nama Fakultas" value="admin">
                            <input type="hidden" class="form-control" id="created_by" name="created_date" placeholder="Nama Fakultas" value="admin">
                            <!-- <div class="form-group">
                                <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                                <select class="custom-select rounded-1" id="exampleSelectRounded0">
                                    <option>Value 1</option>
                                    <option>Value 2</option>
                                    <option>Value 3</option>
                                </select>
                            </div> -->
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                                <select class="custom-select rounded-1" id="exampleSelectRounded0">
                                    <option>Value 1</option>
                                    <option>Value 2</option>
                                    <option>Value 3</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>