<?= $this->extend('Template/V_Template') ?>

<?= $this->section('content') ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Home</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
        <ul class="navbar-nav d-flex justify-content-end">
          <li class="nav-item d-flex align-items-center mx-2">
            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" style="cursor: default;">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none"><?= session()->get('name'); ?></span>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-danger rounded-pill btn-sm mb-0 me-3"
              href="<?= base_url('C_Login/logout') ?>">LOGOUT</a>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Data Dosen</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <p class="text-sm mb-0 text-left">
                    <span class="font-weight-bold ms-1"><?= $count; ?> Dosen
                    </span> Program Studi Manajemen Informatika
                  </p>
                </li>
                <li class="list-inline-item float-end">
                  <button class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    tambah <i class="bi bi-plus-lg"></i>
                  </button>
                </li>
              </ul>
            </div>
            <div class="table-responsive container-fluid mt-3">
              <table class="table align-items-center mb-0 data table-borderless border-white">
                <thead>
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($dosens as $dosen):?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?= $dosen['nama']; ?>
                    </td>
                    <td><?= $dosen['nidn']; ?></td>
                    <td>
                      <a class="btn bg-gradient-primary rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('detail-dosen/'.$dosen['id']) ?>">
                        detail <i class="bi bi-chevron-right"></i></a>
                      <a class="btn bg-gradient-danger rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('delete-dosen/'.$dosen['id']) ?>">
                        <i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" style="z-index: 9999;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="<?= base_url('C_DetailDosen/AddData') ?>" enctype="multipart/form-data">
            <div class="modal-body" style="overflow-y:auto">
              <div class="mb-3">
                <label for="exampleInputNama" class="form-label">Nama</label>
                <input autocomplete="off" required name="nama" type="text" class="form-control" id="exampleInputNama"
                  aria-describedby="Nama">
              </div>
              <div class="mb-3">
                <label for="exampleInputNIDN" class="form-label">NIDN</label>
                <input autocomplete="off" required name="nidn" type="number" class="form-control" id="exampleInputNIDN"
                  aria-describedby="NIDN">
              </div>
              <div class="mb-3">
                <label for="exampleInputProdi" class="form-label">Program Studi</label>
                <input autocomplete="off" required name="prodi" type="text" class="form-control" id="exampleInputProdi"
                  aria-describedby="Prodi">
              </div>
              <div class="mb-3">
                <label for="exampleInputJabFung" class="form-label">Jabatan Fungsional</label>
                <input autocomplete="off" required name="jabatan_fungsional" type="text" class="form-control"
                  id="exampleInputJabFung" aria-describedby="JabFung">
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-1">
                    <label for="exampleInputPendTer" class="form-label">Jenis Kelamin</label>
                    <div class="dropdown d-block">
                      <select class="btn btn-outline-secondary dropdown-toggle" style="width: 100px;" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" name="jenis_kelamin" required>
                        <div class="dropdown-menu">
                          <option class="dropdown-item text-left text-capitalize text-sm" disabled selected value="">
                            pilih...</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="0">Laki-laki</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="1">Perempuan</option>
                        </div>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-1">
                    <label for="exampleInputPendTer" class="form-label">Pendidikan Tertinggi</label>
                    <div class="dropdown d-block">
                      <select class="btn btn-outline-secondary dropdown-toggle" style="width: 100px;" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" name="pendidikan_tertinggi" required>
                        <div class="dropdown-menu">
                          <option class="dropdown-item text-left text-capitalize text-sm" disabled selected value="">
                            pilih...</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="S1">S1</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="S2">S2</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="S3">S3</option>
                        </div>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-1">
                    <label for="exampleInputPendTer" class="form-label">Status Aktivitas</label>
                    <div class="dropdown">
                      <select class="btn btn-outline-secondary dropdown-toggle" style="width: 100px;" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" name="status_aktivitas" required>
                        <div class="dropdown-menu">
                          <option class="dropdown-item text-left text-capitalize text-sm" disabled selected value="">
                            pilih...</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="Aktif">Aktif</option>
                          <option class="dropdown-item text-left text-capitalize text-sm" value="Tidak Aktif">Tidak
                            Aktif</option>
                        </div>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputFoto" class="form-label">Foto</label>
                  <input autocomplete="off" name="foto" type="file" class="form-control" id="exampleInputFoto"
                    aria-describedby="Foto">
                  <p class="text-danger text-sm">*Resolusi maksimal gambar sebesar 1080x1080 pixel</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn bg-gradient-primary">Tambah</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <?= $this->endsection() ?>