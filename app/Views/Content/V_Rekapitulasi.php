<?= $this->extend('Template/V_Template') ?>

<?= $this->section('content') ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Rekapitulasi</h6>
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
  <div class="container-fluid pt-4 pb-0">
    <div class="row my-4" style="max-height: 800px;">
      <div class="col mb-md-0 mb-4">
        <div class="card border-radius-bottom-end-lg-lg border-radius-bottom-start-lg-lg">
          <div class="card-header pb-3 bg-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Rekapitulasi Sertifikat Kompetensi</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <p class="text-sm mb-0 text-left">
                      <span class="font-weight-bold ms-1"><?= $countKompetensi; ?>
                      </span> Sertifikat Kompetensi
                    </p>
                  </li>
                  <li class="list-inline-item float-end">
                    <a class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    href="<?= base_url('rekapitulasi/unduh-sertifikat-kompetensi') ?>">
                      Unduh <i class="px-1 bi bi-download"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="table-responsive container-fluid mt-3">
                <table class="table align-items-center mb-0 kompetensi table-borderless border-white">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Kompetensi</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tahun Perolehan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekapitulasiKompetensis as $kompetensi):?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?= $kompetensi['nama']; ?>
                      </td>
                      <td><?= $kompetensi['nidn']; ?></td>
                      <td><?= $kompetensi['nama_kompetensi']; ?></td>
                      <!-- ubah tanggal -->
                      <?php $tanggal = $kompetensi['tahun_perolehan'];
                      $tanggal = strtotime($tanggal);
                      $tanggal = date('Y', $tanggal);
                      ?>
                      <!-- end of ubah tanggal -->
                      <td><?= $tanggal; ?></td>
                      <td>
                        <a class="btn btn-outline-danger rounded-pill text-sm my-auto text-lowercase"
                          href="<?= base_url('/detail-dosen/sertifikat-kompetensi/download/'.$kompetensi['id']) ?>">
                          <i class="px-1 bi bi-download"></i></a>
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
  </div>
  <div class="container-fluid pt-0 pb-0">
    <div class="row my-4" style="max-height: 800px;">
      <div class="col mb-md-0 mb-4">
        <div class="card border-radius-bottom-end-lg-lg border-radius-bottom-start-lg-lg">
          <div class="card-header pb-3 bg-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Rekapitulasi Sertifikat Pelatihan</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="container-fluid">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <p class="text-sm mb-0 text-left">
                      <span class="font-weight-bold ms-1"><?= $countPelatihan; ?>
                      </span> Sertifikat Pelatihan
                    </p>
                  </li>
                  <li class="list-inline-item float-end">
                    <a class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    href="<?= base_url('rekapitulasi/unduh-sertifikat-pelatihan') ?>">
                      Unduh <i class="px-1 bi bi-download"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="table-responsive container-fluid mt-3">
                <table class="table align-items-center mb-0 pelatihan table-borderless border-white">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal Perolehan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekapitulasiPelatihans as $pelatihan):?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?= $pelatihan['nama']; ?>
                      </td>
                      <td><?= $pelatihan['nidn']; ?></td>
                      <td><?= $pelatihan['nama_kegiatan']; ?></td>
                      <!-- ubah tanggal -->
                      <?php $tanggal = $pelatihan['tanggal_perolehan'];
                      $tanggal = strtotime($tanggal);
                      $tanggal = date('d-m-Y', $tanggal);
                      ?>
                      <!-- end of ubah tanggal -->
                      <td><?= $tanggal; ?></td>
                      <td>
                        <a class="btn btn-outline-danger rounded-pill text-sm my-auto text-lowercase"
                          href="<?= base_url('/detail-dosen/sertifikat-pelatihan/download/'.$pelatihan['id']) ?>">
                          <i class="px-1 bi bi-download"></i></a>
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
    </div>
  </div>
  <div class="container-fluid pt-0 pb-0">
    <div class="row my-4" style="max-height: 800px;">
      <div class="col mb-md-0 mb-4">
        <div class="card border-radius-bottom-end-lg-lg border-radius-bottom-start-lg-lg">
          <div class="card-header pb-3 bg-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Rekapitulasi Sertifikat Seminar</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="container-fluid">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <p class="text-sm mb-0 text-left">
                      <span class="font-weight-bold ms-1"><?= $countSeminar; ?>
                      </span> Sertifikat Seminar
                    </p>
                  </li>
                  <li class="list-inline-item float-end">
                    <a class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    href="<?= base_url('rekapitulasi/unduh-sertifikat-seminar') ?>">
                      Unduh <i class="px-1 bi bi-download"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="table-responsive container-fluid mt-3">
                <table class="table align-items-center mb-0 seminar table-borderless border-white">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal Perolehan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekapitulasiSeminars as $seminar):?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?= $seminar['nama']; ?>
                      </td>
                      <td><?= $seminar['nidn']; ?></td>
                      <td><?= $seminar['nama_kegiatan']; ?></td>
                      <!-- ubah tanggal -->
                      <?php $tanggal = $seminar['tanggal_perolehan'];
                      $tanggal = strtotime($tanggal);
                      $tanggal = date('d-m-Y', $tanggal);
                      ?>
                      <!-- end of ubah tanggal -->
                      <td><?= $tanggal; ?></td>
                      <td>
                        <a class="btn btn-outline-danger rounded-pill text-sm my-auto text-lowercase"
                          href="<?= base_url('/detail-dosen/sertifikat-seminar/download/'.$seminar['id']) ?>">
                          <i class="px-1 bi bi-download"></i></a>
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
    </div>
  </div>
  <div class="container-fluid pt-0 pb-0">                
    <div class="row my-4" style="max-height: 800px;">
      <div class="col mb-md-0 mb-4">
        <div class="card border-radius-bottom-end-lg-lg border-radius-bottom-start-lg-lg">
          <div class="card-header pb-3 bg-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Rekapitulasi Sertifikat Workshop</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="container-fluid">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <p class="text-sm mb-0 text-left">
                      <span class="font-weight-bold ms-1"><?= $countWorkshop; ?>
                      </span> Sertifikat Workshop
                    </p>
                  </li>
                  <li class="list-inline-item float-end">
                    <a class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    href="<?= base_url('rekapitulasi/unduh-sertifikat-workshop') ?>">
                      Unduh <i class="px-1 bi bi-download"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="table-responsive container-fluid mt-3">
                <table class="table align-items-center mb-0 workshop table-borderless border-white">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal Perolehan</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekapitulasiWorkshops as $workshop):?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?= $workshop['nama']; ?>
                      </td>
                      <td><?= $workshop['nidn']; ?></td>
                      <td><?= $workshop['nama_kegiatan']; ?></td>
                      <!-- ubah tanggal -->
                      <?php $tanggal = $workshop['tanggal_perolehan'];
                      $tanggal = strtotime($tanggal);
                      $tanggal = date('d-m-Y', $tanggal);
                      ?>
                      <!-- end of ubah tanggal -->
                      <td><?= $tanggal; ?></td>
                      <td>
                        <a class="btn btn-outline-danger rounded-pill text-sm my-auto text-lowercase"
                          href="<?= base_url('/detail-dosen/sertifikat-workshop/download/'.$workshop['id']) ?>">
                          <i class="px-1 bi bi-download"></i></a>
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
    </div>
  </div>
  <div class="container-fluid pt-0 pb-0">                
    <div class="row my-4" style="max-height: 800px;">
      <div class="col mb-md-0 mb-4">
        <div class="card border-radius-bottom-end-lg-lg border-radius-bottom-start-lg-lg">
          <div class="card-header pb-3 bg-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Rekapitulasi Karya Dosen</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="container-fluid">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <p class="text-sm mb-0 text-left">
                      <span class="font-weight-bold ms-1"><?= $countKaryaDosen; ?>
                      </span> Karya Dosen
                    </p>
                  </li>
                  <li class="list-inline-item float-end">
                    <a class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    href="<?= base_url('rekapitulasi/unduh-karya-dosen') ?>">
                      Unduh <i class="px-1 bi bi-download"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="table-responsive container-fluid mt-3">
                <table class="table align-items-center mb-0 karya table-borderless border-white">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">NIDN</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Karya</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tahun</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Jenis</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Bukti</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekapitulasiKaryaDosens as $karya):?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?= $karya['nama']; ?>
                      </td>
                      <td><?= $karya['nidn']; ?></td>
                      <td><?= $karya['nama_karya']; ?></td>
                      <!-- ubah tanggal -->
                      <?php $tanggal = $karya['tahun'];
                      $tanggal = strtotime($tanggal);
                      $tanggal = date('d-m-Y', $tanggal);
                      ?>
                      <!-- end of ubah tanggal -->
                      <td><?= $tanggal; ?></td>
                      
                      <td><?= $karya['jenis']; ?></td>
                      <td>
                        <a class="btn btn-outline-danger rounded-pill text-sm my-auto text-lowercase"
                          href="<?= base_url('/detail-dosen/karya-dosen/download/'.$karya['id']) ?>">
                          <i class="px-1 bi bi-download"></i></a>
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
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.kompetensi').DataTable({
      'columnDefs': [ {
          'targets': [5], // column index (start from 0)
          'orderable': false, // set orderable false for selected columns
      }]
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.pelatihan').DataTable({
        'columns': [
          { data: 'no' }, // index - 0
          { data: 'nama' }, // index - 1
          { data: 'nidn' }, // index - 2
          { data: 'nama_kegiatan' }, // index - 3
          { data: 'tanggal_perolehan' }, // index - 4
          { data: 'sertifikat' }, // index - 5
      ],
      'columnDefs': [ {
          'targets': [5], // column index (start from 0)
          'orderable': false, // set orderable false for selected columns
      }]
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.seminar').DataTable({
        'columns': [
          { data: 'no' }, // index - 0
          { data: 'nama' }, // index - 1
          { data: 'nidn' }, // index - 2
          { data: 'nama_kegiatan' }, // index - 3
          { data: 'tanggal_perolehan' }, // index - 4
          { data: 'sertifikat' }, // index - 5
      ],
      'columnDefs': [ {
          'targets': [5], // column index (start from 0)
          'orderable': false, // set orderable false for selected columns
      }]
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.workshop').DataTable({
        'columns': [
          { data: 'no' }, // index - 0
          { data: 'nama' }, // index - 1
          { data: 'nidn' }, // index - 2
          { data: 'nama_kegiatan' }, // index - 3
          { data: 'tanggal_perolehan' }, // index - 4
          { data: 'sertifikat' }, // index - 5
      ],
      'columnDefs': [ {
          'targets': [5], // column index (start from 0)
          'orderable': false, // set orderable false for selected columns
      }]
      });
    });
  </script>
    <?= $this->endsection() ?>