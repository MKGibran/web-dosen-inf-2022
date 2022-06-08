<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Profile
$routes->get('/akun', 'C_Akun::index');
$routes->get('/akun/update', 'C_Akun::UpdateData');

// Rekapitulasi
$routes->get('/rekapitulasi', 'C_Rekapitulasi::index');
$routes->get('/rekapitulasi/unduh-sertifikat-kompetensi', 'C_SertifikatKompetensi::Spreadsheet');
$routes->get('/rekapitulasi/unduh-sertifikat-pelatihan', 'C_SertifikatPelatihan::Spreadsheet');
$routes->get('/rekapitulasi/unduh-sertifikat-seminar', 'C_SertifikatSeminar::Spreadsheet');
$routes->get('/rekapitulasi/unduh-sertifikat-workshop', 'C_SertifikatWorkshop::Spreadsheet');
$routes->get('/rekapitulasi/unduh-karya-dosen', 'C_KaryaDosen::Spreadsheet');

// Data Dosen
$routes->get('/', 'C_MainPage::index');
$routes->get('/home', 'C_MainPage::index');
$routes->get('/detail-dosen/(:num)', 'C_DetailDosen::index/$1');
$routes->get('/delete-dosen/(:num)', 'C_DetailDosen::DeleteData/$1');
$routes->get('/unduh-ijazah/(:num)', 'C_RiwayatPendidikan::Download/$1');
$routes->get('/delete-data-pendidikan/(:num)', 'C_RiwayatPendidikan::DeleteData/$1');
$routes->get('/delete-data-mengajar/(:num)', 'C_RiwayatMengajar::DeleteData/$1');
$routes->get('/unduh/rekapitulasi-sertifikat/(:num)', 'C_DetailDosen::Spreadsheet/$1');

// Sertifikat Pelatihan
$routes->get('/detail-dosen/sertifikat-pelatihan/(:num)', 'C_SertifikatPelatihan::index/$1');
$routes->get('/detail-dosen/sertifikat-pelatihan/delete/(:num)', 'C_SertifikatPelatihan::DeleteData/$1');
$routes->get('/detail-dosen/sertifikat-pelatihan/download/(:num)', 'C_SertifikatPelatihan::Download/$1');

// Sertifikat Kompetensi
$routes->get('/detail-dosen/sertifikat-kompetensi/(:num)', 'C_SertifikatKompetensi::index/$1');
$routes->get('/detail-dosen/sertifikat-kompetensi/delete/(:num)', 'C_SertifikatKompetensi::DeleteData/$1');
$routes->get('/detail-dosen/sertifikat-kompetensi/download/(:num)', 'C_SertifikatKompetensi::Download/$1');

// Sertifikat Seminar
$routes->get('/detail-dosen/sertifikat-seminar/(:num)', 'C_SertifikatSeminar::index/$1');
$routes->get('/detail-dosen/sertifikat-seminar/delete/(:num)', 'C_SertifikatSeminar::DeleteData/$1');
$routes->get('/detail-dosen/sertifikat-seminar/download/(:num)', 'C_SertifikatSeminar::Download/$1');

// Sertifikat Workshop
$routes->get('/detail-dosen/sertifikat-workshop/(:num)', 'C_SertifikatWorkshop::index/$1');
$routes->get('/detail-dosen/sertifikat-workshop/delete/(:num)', 'C_SertifikatWorkshop::DeleteData/$1');
$routes->get('/detail-dosen/sertifikat-workshop/download/(:num)', 'C_SertifikatWorkshop::Download/$1');

// Karya Dosen
$routes->get('/detail-dosen/karya-dosen/(:num)', 'C_KaryaDosen::index/$1');
$routes->get('/detail-dosen/karya-dosen/delete/(:num)', 'C_KaryaDosen::DeleteData/$1');
$routes->get('/detail-dosen/karya-dosen/download/(:num)', 'C_KaryaDosen::Download/$1');

// Auth
$routes->get('/login', 'C_Login::index');
$routes->get('/register', 'C_Login::register');
$routes->post('/login/process', 'C_Login::login');
$routes->get('/logout', 'C_Login::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
