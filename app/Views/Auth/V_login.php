<!--
=========================================================
* Soft UI Dashboard - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('/assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('/assets/img/logo-ipb.png') ?>">
  <title>
    <?= $title; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('/assets/css/soft-ui-dashboard.css?v=1.0.5') ?>" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <p class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
        Web Dosen
    </p>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-70 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url('/assets/img/curved-images/curved14.jpg') ?>');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <!-- <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            </div>
          </div> -->
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pb-0">
                <h5>Web Dosen SV IPB</h5>
              </div>
              <div class="card-body">
              <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-0" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
              <?php endif; ?>
                <form role="form text-left" action="<?= base_url('C_login/login') ?>" method="POST">
                  <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                  </div>
                  <div class="mb-0">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign In</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-2">
      <div class="container">
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © Muhammad Kahlil Gibran | <script>
                document.write(new Date().getFullYear())
              </script>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url('/assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('/assets/js/soft-ui-dashboard.min.js?v=1.0.5') ?>"></script>
</body>

</html>