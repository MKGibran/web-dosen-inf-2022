<?= $this->extend('Template/V_Template') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= base_url('detail-dosen/'. $dosen_id) ?>">Detail Dosen</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sertifikat Seminar</li>
          </ol>
        <h6 class="font-weight-bolder mb-0">Sertifikat Seminar</h6>
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

    <!-- Card Riwayat Seminar -->
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Sertifikat Seminar</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
              <ul class="list-inline">
                <li class="list-inline-item">
                <p class="text-sm mb-0 text-left">
                    <span class="ms-1"><?= $dosen[0]['nama']; ?>
                    </span>
                  </p>
                  <p class="text-sm mb-0 text-left">
                    <span class="font-weight-bold ms-1"><?= $countSeminar; ?>
                    </span> Sertifikat Seminar
                  </p>
                </li>
                <li class="list-inline-item float-end">
                  <button class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    data-bs-toggle="modal" data-bs-target="#addSeminar">
                    tambah <i class="bi bi-plus-lg"></i>
                  </button>
                  <!-- Modal Add Data Seminar -->
                  <div class="modal fade" id="addSeminar" tabindex="-1" aria-labelledby="addSeminar"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Sertifikat Seminar</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('C_SertifikatSeminar/AddData') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="dosen_id" value="<?= $dosen_id; ?>">
                            <div class="mb-3">
                              <label for="exampleInputNamaKegiatan" class="form-label">Nama Kegiatan</label>
                              <input autocomplete="off" required name="nama_kegiatan" type="text"
                              class="form-control" id="exampleInputNamaKegiatan" aria-describedby="NamaKegiatan">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTanggal" class="form-label">Tanggal Perolehan</label>
                                <input autocomplete="off" required name="tanggal_perolehan" type="date" class="form-control"
                                id="exampleInputTanggal" aria-describedby="Tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputSertifikat" class="form-label">Sertifikat</label>
                                <input autocomplete="off" required name="sertifikat" type="file" class="form-control"
                                id="exampleInputSertifikat" aria-describedby="Sertifikat">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn bg-gradient-primary">Tambah</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="table-responsive container-fluid mt-3">
              <table class="table align-items-center mb-0 data">
                <thead>
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal Perolehan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sertifikat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($seminars as $seminar):?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $seminar['nama_kegiatan']; ?></td>
                    <!-- ubah tanggal -->
                    <?php $tanggal = $seminar['tanggal_perolehan'];
                    $tanggal = strtotime($tanggal);
                    $tanggal = date('d-m-Y', $tanggal);
                     ?>
                     <!-- end of ubah tanggal -->
                    <td><?= $tanggal; ?></td>
                    <td>
                      <a class="btn bg-gradient-primary rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('detail-dosen/sertifikat-seminar/download/'.$seminar['id']) ?>">
                        unduh <i class="px-1 bi bi-download"></i></a>
                    </td>
                    <td>
                      <a class="btn bg-gradient-danger rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('detail-dosen/sertifikat-seminar/delete/'.$seminar['id']) ?>">
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

    <?= $this->endsection() ?>