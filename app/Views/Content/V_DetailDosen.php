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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Dosen</li>
          </ol>
        <h6 class="font-weight-bolder mb-0">Detail Data Dosen</h6>
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
    <!-- Card Detail Data Dosen -->
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4><?= $result[0]['nama']; ?></h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
              <div class="row mb-3">
                <div class="col-sm-12 col-md-6 col-xl-6">
                  <img src="<?= base_url('/assets/uploads') ?>/<?= $result[0]['foto']; ?>" alt="foto"
                    class="img-fluid rounded">
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6">
                  <div class="table-responsive mt-3" style="overflow-y: auto;">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Nama</td>
                          <td class="text-right"><?= $result[0]['nama']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">NIDN</td>
                          <td class="text-right"><?= $result[0]['nidn']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Perguruan Tinggi</td>
                          <td class="text-right"><?= $result[0]['ptn']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Program Studi</td>
                          <td class="text-right"><?= $result[0]['prodi']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Jenis Kelamin</td>
                          <?php if ($result[0]['jk'] == 0):?>
                          <td class="text-right">Laki-laki</td>
                          <?php elseif ($result[0]['jk'] == 1):?>
                          <td class="text-right">Perempuan</td>
                          <?php endif ?>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Jabatan Fungsional</td>
                          <td class="text-right"><?= $result[0]['jabatan_fungsional']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Pendidikan Tertinggi</td>
                          <td class="text-right"><?= $result[0]['pendidikan_tertinggi']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Status Aktivitas</td>
                          <td class="text-right"><?= $result[0]['status_aktivitas']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left" style="opacity: 70%;">Sertifikat</td>
                          <td class="text-right">
                            <div class="dropdown">
                              <button
                                class="btn bg-gradient-primary rounded-pill text-sm text-capitalize dropdown-toggle"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Lihat Sertifikat</i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item text-capitalize"
                                    href="<?= base_url('detail-dosen/sertifikat-kompetensi/'.$result[0]['id']) ?>">Kompetensi</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize"
                                    href="<?= base_url('detail-dosen/sertifikat-pelatihan/'.$result[0]['id']) ?>">Pelatihan</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize"
                                    href="<?= base_url('detail-dosen/sertifikat-seminar/'.$result[0]['id']) ?>">Seminar</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize"
                                    href="<?= base_url('detail-dosen/sertifikat-workshop/'.$result[0]['id']) ?>">Workshop</a>
                                </li>
                              </ul>
                              <a href="<?= base_url('unduh/rekapitulasi-sertifikat/'.$result[0]['id']) ?>" class="btn btn-danger text-capitalize text-sm rounded-pill">Rekapitulasi 
                              <i class="bi bi-download"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="d-grid mt-2 container">
                      <a type="button" class="btn bg-gradient-danger btn-block text-capitalize mb-0" role="button"
                        data-bs-toggle="modal" data-bs-target="#editProfile">Ubah</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Card Riwayat Pendidikan -->
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Riwayat Pendidikan</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <p class="text-sm mb-0 text-left">
                    <span class="font-weight-bold ms-1"><?= $countPendidikan; ?>
                    </span> Riwayat Pendidikan
                  </p>
                </li>
                <li class="list-inline-item float-end">
                  <button class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    data-bs-toggle="modal" data-bs-target="#addPendidikan">
                    tambah <i class="bi bi-plus-lg"></i>
                  </button>
                  <!-- Modal Add Data Pendidikan -->
                  <div class="modal fade" id="addPendidikan" tabindex="-1" aria-labelledby="addPendidikan"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Pendidikan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('C_RiwayatPendidikan/AddData') ?>" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="dosen_id" value="<?= $result[0]['id']; ?>">
                            <div class="mb-3">
                              <label for="exampleInputPTN" class="form-label">Perguruan Tinggi</label>
                              <input autocomplete="off" required name="perguruan_tinggi" type="text"
                                class="form-control" id="exampleInputPTN" aria-describedby="PTN">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputGelar" class="form-label">Gelar Akademik</label>
                              <input autocomplete="off" required name="gelar_akademik" type="text" class="form-control"
                                id="exampleInputGelar" aria-describedby="Gelar">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputTanggal" class="form-label">Tanggal ijazah</label>
                              <input autocomplete="off" required name="tanggal_ijazah" type="date" class="form-control"
                                id="exampleInputTanggal" aria-describedby="Tanggal">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputTanggal" class="form-label">Jenjang</label>
                              <div class="dropdown d-block">
                                <select class="btn btn-outline-secondary dropdown-toggle" style="width: 200px;"
                                  type="button" data-bs-toggle="dropdown" aria-expanded="false" name="jenjang" required>
                                  <div class="dropdown-menu">
                                    <option class="dropdown-item text-left text-capitalize text-sm" disabled selected
                                      value="">
                                      pilih...</option>
                                    <option class="dropdown-item text-left text-capitalize text-sm" value="D3">D3
                                    </option>
                                    <option class="dropdown-item text-left text-capitalize text-sm" value="D4">D4
                                    </option>
                                    <option class="dropdown-item text-left text-capitalize text-sm" value="S1">S1
                                    </option>
                                    <option class="dropdown-item text-left text-capitalize text-sm" value="S2">S2
                                    </option>
                                    <option class="dropdown-item text-left text-capitalize text-sm" value="S3">S3
                                    </option>
                                  </div>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputTanggal" class="form-label">Ijazah</label>
                              <input autocomplete="off" required name="ijazah" type="file" class="form-control"
                                id="exampleInputTanggal" aria-describedby="Tanggal">
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
              <table class="table align-items-center mb-0 pendidikan">
                <thead>
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Perguruan Tinggi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Gelar Akademik</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal Ijazah</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Jenjang</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Ijazah</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($pendidikans as $pendidikan):?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?= $pendidikan['perguruan_tinggi']; ?>
                    </td>
                    <td><?= $pendidikan['gelar_akademik']; ?></td>
                    <!-- ubah tanggal -->
                    <?php $tanggal = $pendidikan['tanggal_ijazah'];
                    $tanggal = strtotime($tanggal);
                    $tanggal = date('d-m-Y', $tanggal);
                     ?>
                    <!-- end of ubah tanggal -->
                    <td><?= $tanggal; ?></td>
                    <td><?= $pendidikan['jenjang']; ?></td>
                    <td>
                      <a class="btn bg-gradient-primary rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('unduh-ijazah/'.$pendidikan['id']) ?>">
                        unduh <i class="px-1 bi bi-download"></i></a>
                    </td>
                    <td>
                      <a class="btn bg-gradient-danger rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('delete-data-pendidikan/'.$pendidikan['id']) ?>">
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
    <!-- Card Riwayat Mengajar -->
    <div class="row my-4">
      <div class="col mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-3 bg-gradient-primary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Riwayat Mengajar</h4>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container-fluid">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <p class="text-sm mb-0 text-left">
                    <span class="font-weight-bold ms-1"><?= $countMengajar; ?>
                    </span> Riwayat Mengajar
                  </p>
                </li>
                <li class="list-inline-item float-end">
                  <button class="btn bg-gradient-primary d-flex float-end rounded-pill text-sm text-lowercase"
                    data-bs-toggle="modal" data-bs-target="#addMengajar">
                    tambah <i class="bi bi-plus-lg"></i>
                  </button>
                  <!-- Modal Add Data Mengajar -->
                  <div class="modal fade" id="addMengajar" tabindex="-1" aria-labelledby="addMengajar"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Mengajar</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('C_RiwayatMengajar/AddData') ?>" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="dosen_id" value="<?= $result[0]['id']; ?>">
                            <div class="mb-3">
                              <label for="exampleInputSemester" class="form-label">Semester</label>
                              <input autocomplete="off" required name="semester" type="text" class="form-control"
                                id="exampleInputSemester" aria-describedby="Semester">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputKodeMatkul" class="form-label">Kode Matkul</label>
                              <input autocomplete="off" required name="kode_matkul" type="text" class="form-control"
                                id="exampleInputKodeMatkul" aria-describedby="KodeMatkul">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputNamaMatkul" class="form-label">Nama Mata Kuliah</label>
                              <input autocomplete="off" required name="nama_matkul" type="text" class="form-control"
                                id="exampleInputNamaMatkul" aria-describedby="NamaMatkul">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputKodeKelas" class="form-label">Kode Kelas</label>
                              <input autocomplete="off" required name="kode_kelas" type="text" class="form-control"
                                id="exampleInputKodeKelas" aria-describedby="KodeKelas">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPTN" class="form-label">Perguruan Tinggi</label>
                              <input autocomplete="off" required name="ptn" type="text" class="form-control"
                                id="exampleInputPTN" aria-describedby="PTN">
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
              <table class="table align-items-center mb-0 mengajar">
                <thead>
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Semester</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Kode Mata Kuliah</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nama Mata Kuliah</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Kode Kelas</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Perguruan Tinggi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($mengajars as $mengajar):?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?= $mengajar['semester']; ?>
                    </td>
                    <td><?= $mengajar['kode_matkul']; ?></td>
                    <td><?= $mengajar['nama_matkul']; ?></td>
                    <td><?= $mengajar['kode_kelas']; ?></td>
                    <td><?= $mengajar['ptn']; ?></td>
                    <td>
                      <a class="btn bg-gradient-danger rounded-pill text-sm my-auto text-lowercase"
                        href="<?= base_url('delete-data-mengajar/'.$mengajar['id']) ?>">
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

    <!-- ====================================================================================================================== -->
    <!-- Modal Edit Data Dosen -->
    <div class="modal fade" style="z-index: 9999;" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Dosen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="<?= base_url('C_DetailDosen/UpdateData') ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result[0]['id']; ?>">
            <div class="modal-body" style="overflow-y:auto">
              <div class="mb-3">
                <label for="exampleInputNama" class="form-label">Nama</label>
                <input value="<?= $result[0]['nama']; ?>" placeholder="<?= $result[0]['nama']; ?>" autocomplete="off" required
                  name="nama" type="text" class="form-control" id="exampleInputNama" aria-describedby="Nama">
              </div>
              <div class="mb-3">
                <label for="exampleInputNIDN" class="form-label">NIDN</label>
                <input value="<?= $result[0]['nidn']; ?>" placeholder="<?= $result[0]['nidn']; ?>" autocomplete="off" required
                  name="nidn" type="number" class="form-control" id="exampleInputNIDN" aria-describedby="NIDN">
              </div>
              <div class="mb-3">
                <label for="exampleInputProdi" class="form-label">Program Studi</label>
                <input value="<?= $result[0]['prodi']; ?>" placeholder="<?= $result[0]['prodi']; ?>" autocomplete="off"
                  required name="prodi" type="text" class="form-control" id="exampleInputProdi"
                  aria-describedby="Prodi">
              </div>
              <div class="mb-3">
                <label for="exampleInputJabFung" class="form-label">Jabatan Fungsional</label>
                <input value="<?= $result[0]['jabatan_fungsional']; ?>" placeholder="<?= $result[0]['jabatan_fungsional']; ?>"
                  autocomplete="off" required name="jabatan_fungsional" type="text" class="form-control"
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('.pendidikan').DataTable({
          'columns': [
            { data: 'no' }, // index - 0
            { data: 'perguruan_tinggi' }, // index - 1
            { data: 'gelar_akademik' }, // index - 2
            { data: 'tanggal_ijazah' }, // index - 3
            { data: 'jenjang' }, // index - 4
            { data: 'ijazah' }, // index - 5
            { data: 'aksi' }, // index - 6
        ],
        'columnDefs': [ {
            'targets': [5,6], // column index (start from 0)
            'orderable': false, // set orderable false for selected columns
        }]
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.mengajar').DataTable({
          'columns': [
            { data: 'no' }, // index - 0
            { data: 'semester' }, // index - 1
            { data: 'kode_matakuliah' }, // index - 2
            { data: 'nama_matakuliah' }, // index - 3
            { data: 'kode_kelas' }, // index - 4
            { data: 'perguruan_tinggi' }, // index - 5
            { data: 'aksi' }, // index - 6
        ],
        'columnDefs': [ {
            'targets': [6], // column index (start from 0)
            'orderable': false, // set orderable false for selected columns
        }]
        });
      });
    </script>
  </div>


  <?= $this->endsection() ?>