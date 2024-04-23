  <!-- Main Sidebar Container -->
  <base href="<?= base_url("assets") ?>/">

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <!-- <img src="dist/img/uinma.png" class="img-circle elevation-2" alt="User Image"> -->
              </div>
              <div class="info">
                  <a class="d-block">Admin</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= site_url('Home/index') ?>" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link ">
                          <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Input 
                              <i class="right fas fa-angle-left"></i>
                              <!-- <span class="badge badge-info right">4</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview"> 
                          <li class="nav-item">
                              <!-- <a href="<?= site_url('Home/inputAkre') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Input Akreditasi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputFak') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Fakultas</p>
                              </a>
                          </li> -->
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputPrd') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Input Data Prodi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputMhs') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Input Data Mahasiswa</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputTendik') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Input Data Tenaga Didik</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link ">
                          <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Master Data
                              <i class="right fas fa-angle-left"></i>
                              <!-- <span class="badge badge-info right">4</span> -->
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= site_url('Home/viewFak') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Fakultas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputPrd') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Prodi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputMhs') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Mahasiswa</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= site_url('Home/inputTendik') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Tenaga Didik</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>