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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Karya Dosen</li>
          </ol>
        <h6 class="font-weight-bolder mb-0">Karya Dosen</h6>
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

    <!-- Card Riwayat karya -->
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Karya Dosen</h4>
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
                    <span class="font-weight-bold ms-1"><?= $countKarya; ?>
                    </span> Karya Dosen
                  </p>
                </li>
                <li class="list-inline-item float-end">
                  <button class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    data-bs-toggle="modal" data-bs-target="#addKaryaDosen">
                    tambah <i class="bi bi-plus-lg"></i>
                  </button>
                  <!-- Modal Add Data Karya -->
                  <div class="modal fade" id="addKaryaDosen" tabindex="-1" aria-labelledby="addKaryaDosen"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Karya Dosen</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('C_KaryaDosen/AddData') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="dosen_id" value="<?= $dosen_id; ?>">
                          <div class="mb-3">
                              <label for="exampleInputNama_Karya" class="form-label">Nama Karya</label>
                              <input autocomplete="off" required name="nama_karya" type="text"
                                class="form-control" id="exampleInputNama_Karya" aria-describedby="Nama_Karya">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputTahun" class="form-label">Tahun</label>
                              <input autocomplete="off" required name="tahun" type="date" class="form-control"
                                id="exampleInputTahun" aria-describedby="Tahun">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputJenis" class="form-label">Jenis</label>
                              <input autocomplete="off" required name="jenis" type="text" class="form-control"
                                id="exampleInputJenis" aria-describedby="Jenis">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputJenisBukti" class="form-label">Jenis Bukti</label>
                              <input autocomplete="off" required name="jenis_bukti" type="text" class="form-control"
                                id="exampleInputJenisBukti" aria-describedby="JenisBukti">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputNomor" class="form-label">Nomor</label>
                              <input autocomplete="off" name="nomor" type="text" class="form-control"
                                id="exampleInputNomor" aria-describedby="Nomor">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputSitasi" class="form-label">Jumlah Sitasi</label>
                              <input autocomplete="off" name="sitasi" type="number" class="form-control"
                                id="exampleInputSitasi" aria-describedby="Sitasi">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputTautan" class="form-label">Tautan</label>
                              <input autocomplete="off" name="tautan" type="text" class="form-control"
                                id="exampleInputTautan" aria-describedby="Tautan">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputBukti" class="form-label">Bukti</label>
                              <input autocomplete="off" required name="bukti" type="file" class="form-control"
                                id="exampleInputBukti" aria-describedby="Bukti">
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
              <table class="table align-items-center mb-0 karya table-borderless border-white">
                <thead>
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Karya</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tahun</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Jenis</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Jenis Bukti</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nomor</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sitasi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tautan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Bukti</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($karyas as $karya):?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td><?= $karya['nama_karya']; ?></td>
                    <!-- ubah Tahun -->
                    <?php $tahun = $karya['tahun'];
                    $tahun = strtotime($tahun);
                    $tahun = date('Y', $tahun);
                     ?>
                     <!-- end of ubah tahun -->
                    <td><?= $tahun; ?></td>
                    <td><?= $karya['jenis']; ?></td>
                    <td><?= $karya['jenis_bukti']; ?></td>
                    <?php if($karya['nomor'] == NULL): ?>
                      <td class="text-center">-</td>
                    <?php elseif($karya['nomor'] != NULL): ?>
                      <td><?= $karya['nomor']; ?></td>
                    <?php endif; ?>
                    <?php if($karya['sitasi'] == 0): ?>
                      <td class="text-center">-</td>
                    <?php elseif($karya['sitasi'] != 0): ?>
                      <td><?= $karya['sitasi']; ?></td>
                    <?php endif; ?>
                    <?php if($karya['tautan'] == NULL): ?>
                      <td class="text-center">-</td>
                    <?php elseif($karya['tautan'] != NULL): ?>
                      <td><?= $karya['tautan']; ?></td>
                    <?php endif; ?>
                    <td>
                      <a class="btn bg-gradient-primary rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('detail-dosen/karya-dosen/download/'.$karya['id']) ?>">
                        unduh <i class="px-1 bi bi-download"></i></a>
                    </td>
                    <td>
                      <a class="btn bg-gradient-danger rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('detail-dosen/karya-dosen/delete/'.$karya['id']) ?>">
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