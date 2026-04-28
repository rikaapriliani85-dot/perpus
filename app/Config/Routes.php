<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ================= AUTH =================
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// ================= HOME =================
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');

// ================= USERS =================
$routes->get('users', 'Users::index');
$routes->get('users/create', 'Users::create');
$routes->post('users/store', 'Users::store');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');

$routes->get('users/detail/(:num)', 'Users::detail/$1');
$routes->get('users/delete/(:num)', 'Users::delete/$1');
$routes->get('users/wa/(:num)', 'Users::wa/$1');
$routes->get('users/print', 'Users::print');

$routes->get('buku', 'Buku::index');
$routes->get('buku/create', 'Buku::create');
$routes->post('buku/store', 'Buku::store');
$routes->get('buku/detail/(:num)', 'Buku::detail/$1');
$routes->get('buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('buku/update/(:num)', 'Buku::update/$1');
$routes->get('buku/delete/(:num)', 'Buku::delete/$1');
$routes->get('buku/print', 'Buku::print');
$routes->get('buku/wa/(:num)', 'Buku::wa/$1');

// ================= PEMINJAMAN =================
// Peminjaman
$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('anggota/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/create', 'Peminjaman::create');
$routes->post('peminjaman/store', 'Peminjaman::store');
$routes->get('/peminjaman/edit/(:num)', 'Peminjaman::edit/$1');
$routes->post('/peminjaman/update/(:num)', 'Peminjaman::update/$1');
$routes->get('peminjaman/delete/(:num)', 'Peminjaman::delete/$1');
$routes->get('/peminjaman/detail/(:num)', 'Peminjaman::detail/$1');
$routes->get('anggota/buku', 'Buku::anggota');
$routes->get('peminjaman/pinjam/(:num)', 'Peminjaman::pinjam/$1');
$routes->get('peminjaman/saya', 'Peminjaman::peminjamanSaya');
$routes->get('anggota/buku', 'Peminjaman::bukuAnggota');
$routes->get('anggota/pinjam/(:num)', 'Peminjaman::pinjam/$1');
$routes->get('anggota/form-pinjam/(:num)', 'Peminjaman::formPinjam/$1');
$routes->post('peminjaman/prosesPinjam', 'Peminjaman::prosesPinjam');
$routes->post('peminjaman/storeAnggota', 'Peminjaman::storeAnggota');
$routes->get('anggota/buku', 'Peminjaman::bukuAnggota');
$routes->get('peminjaman/pinjam/(:num)', 'Peminjaman::pinjam/$1');
$routes->get('peminjaman/kembalikan/(:num)', 'Peminjaman::kembalikan/$1');
$routes->get('anggota/pinjam/(:num)', 'Anggota::pinjam/$1');
// ================= KATEGORI =================
$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/create', 'Kategori::create');
$routes->post('kategori/store', 'Kategori::store');

$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');

$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');
$routes->get('kategori/print', 'Kategori::print');
$routes->get('kategori/detail/(:num)', 'Kategori::detail/$1');

// ================= RAK =================
$routes->get('/rak', 'Rak::index');
$routes->get('/rak/create', 'Rak::create');
$routes->post('/rak/store', 'Rak::store');
$routes->get('/rak/edit/(:num)', 'Rak::edit/$1');
$routes->post('/rak/update/(:num)', 'Rak::update/$1');
$routes->get('/rak/delete/(:num)', 'Rak::delete/$1');
$routes->post('/rak/delete/(:num)', 'Rak::delete/$1');

$routes->get('/rak/detail/(:num)', 'Rak::detail/$1');

// ================= PENERBIT =================
$routes->get('penerbit', 'Penerbit::index');
$routes->get('penerbit/create', 'Penerbit::create');
$routes->post('penerbit/store', 'Penerbit::store');
$routes->get('penerbit/delete/(:num)', 'Penerbit::delete/$1');

// ================= PENULIS =================
$routes->get('penulis', 'Penulis::index');
$routes->get('penulis/create', 'Penulis::create');
$routes->post('penulis/store', 'Penulis::store');
$routes->get('penulis/delete/(:num)', 'Penulis::delete/$1');

$routes->post('penerbit/delete/(:num)', 'Penerbit::delete/$1');

// ================= BACKUP & RESTORE =================
$routes->get('/backup', 'Backup::index');
$routes->get('/restore', 'Restore::index');
$routes->post('/restore/auth', 'Restore::auth');
$routes->get('/restore/form', 'Restore::form');
$routes->post('/restore/process', 'Restore::process');
// ================= ULASAN =================
$routes->get('ulasan', 'Ulasan::index');
$routes->get('ulasan/create', 'Ulasan::create');
$routes->post('ulasan/store', 'Ulasan::store');

$routes->get('ulasan/edit/(:num)', 'Ulasan::edit/$1');
$routes->post('ulasan/update/(:num)', 'Ulasan::update/$1');

$routes->get('ulasan/delete/(:num)', 'Ulasan::delete/$1');

// ================= TRANSAKSI =================
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/create', 'Transaksi::create');
$routes->post('transaksi/store', 'Transaksi::store');

$routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');

$routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');

// ================= PENARIKAN =================
$routes->get('penarikan', 'Penarikan::index');
$routes->get('penarikan/create', 'Penarikan::create');
$routes->post('penarikan/store', 'Penarikan::store');

$routes->get('penarikan/edit/(:num)', 'Penarikan::edit/$1');
$routes->post('penarikan/update/(:num)', 'Penarikan::update/$1');

$routes->get('penarikan/delete/(:num)', 'Penarikan::delete/$1');

// ================= RESERVASI =================
$routes->get('reservasi', 'Reservasi::index');
$routes->get('reservasi/create', 'Reservasi::create');
$routes->post('reservasi/store', 'Reservasi::store');

$routes->get('reservasi/edit/(:num)', 'Reservasi::edit/$1');
$routes->post('reservasi/update/(:num)', 'Reservasi::update/$1');

$routes->get('reservasi/delete/(:num)', 'Reservasi::delete/$1');

// ================= PENGATURAN =================
$routes->get('pengaturan', 'Pengaturan::index');
$routes->post('pengaturan/update/(:num)', 'Pengaturan::update/$1');
$routes->post('pengaturan/save', 'Pengaturan::save');

$routes->get('pengembalian', 'Pengembalian::index');
$routes->get('pengembalian/create', 'Pengembalian::create');
$routes->get('pengembalian/create', 'Pengembalian::create');
$routes->post('pengembalian/store', 'Pengembalian::store');
$routes->get('pengembalian/detail/(:num)', 'Pengembalian::detail/$1');
$routes->get('pengembalian/delete/(:num)', 'Pengembalian::delete/$1');
$routes->get('pengembalian/hitung/(:num)', 'Pengembalian::hitung/$1');
$routes->get('users/edit', 'Users::edit'); 
$routes->get('users/edit/(:num)', 'Users::edit/$1');