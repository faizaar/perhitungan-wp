<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Tambah data
$routes->get('/Home/tambahkonversi', 'Home::tambahKonversi');
$routes->get('/Home/tambahkriteria', 'Home::tambahKriteria'); // Form tambah data kriteria
$routes->get('Home/forminputmhs', 'Home::forminputmhs');

// Simpan data
$routes->post('/Home/simpankonversi', 'Home::simpanKv'); // Menyimpan data kriteria
$routes->post('Home/simpanA', 'Home::simpanA');
$routes->post('/Home/simpanKriteria', 'Home::simpanK'); // Menyimpan data kriteria

// Delete data


// Edit Data


$routes->get('/', 'Home::index');
$routes->get('/Home/viewkriteria', 'Home::viewkriteria');
$routes->get('/Home/viewalternatif', 'Home::viewalternatif');
$routes->post('Home/update_data/(:num)', 'Home::update_data/$1');
$routes->get('/Home/formedit/(:num)', 'Home::formedit/$1');
$routes->get('/Home/delete/(:num)', 'Home::delete/$1');
// $routes->post('Home/simpanA', 'Home::simpanA');


$routes->get('/Home/editkriteria/(:num)', 'Home::formEditKriteria/$1'); // Form edit data kriteria
$routes->get('/Home/editkonversi/(:num)', 'Home::formEditKonversi/$1'); // Form edit data kriteria
$routes->get('/Home/updatekriteria/(:num)', 'Home::updateKriteria/$1'); // Form edit data kriteria
$routes->post('/Home/updatekriteria/(:num)', 'Home::updateKriteria/$1');
$routes->post('/Home/updatekonversi/(:num)', 'Home::updateKonversi/$1');
$routes->post('/Home/updatealternatif', 'Home::updateAlternatif'); // Memproses update data kriteria
$routes->get('/Home/deletekriteria/(:num)', 'Home::deleteKriteria/$1'); 
$routes->get('/Home/deletekonversi/(:num)', 'Home::deleteKonversi/$1'); 
$routes->get('/Home/viewkonversi', 'Home::viewkonversi');
$routes->get('/Home/viewnormalisasi', 'Home::viewnormalisasi'); 
$routes->get('/Home/viewbobot', 'Home::viewbobot'); 
$routes->get('/Home/viewhasil', 'Home::viewhasil'); 
$routes->get('/Home/viewrangking', 'Home::viewrangking'); 
