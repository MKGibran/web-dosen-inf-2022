<?= $this->extend('Template/V_Template') ?>

<?= $this->section('content') ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Akun</h6>
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
    <div class="row my-0">
      <div class="col mb-md-0 mb-4">
      <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?= $akun['nama']; ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Username : <span><?= $akun['username']; ?></span>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                  <btn class="btn bg-gradient-primary rounded-pill mb-0 px-5 float-end py-1 py-1 text-capitalize"
                  data-bs-toggle="modal" data-bs-target="#editAkun">Edit</btn>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" style="z-index: 9999;" id="editAkun" tabindex="-1" aria-labelledby="editAkun"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="<?= base_url('C_Akun/UpdateData') ?>">
            <div class="modal-body" style="overflow-y:auto">
            <input type="hidden" name="id" value="<?= $akun['id']; ?>">
              <div class="mb-3">
                <label for="exampleInputNama" class="form-label">Nama</label>
                <input autocomplete="off" placeholder="<?= $akun['nama']; ?>" 
                name="nama" type="text" class="form-control" value="<?= $akun['nama']; ?>" id="exampleInputNama"
                  aria-describedby="Nama">
              </div>
              <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input autocomplete="off" placeholder="<?= $akun['username']; ?>" 
                name="username" type="text" class="form-control" value="<?= $akun['username']; ?>" id="exampleInputUsername"
                  aria-describedby="Username">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input autocomplete="off" name="password" type="password" class="form-control" id="exampleInputPassword"
                  aria-describedby="Password">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-gradient-primary">Ubah</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <?= $this->endsection() ?>