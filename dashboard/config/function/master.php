<?php 

//PEMANGGILAN FILE DATABASE DAN KONFIGURASI
require_once("../app/config/database/database.php");
require_once("../app/config/konfigurasi/konfigurasi.php");

//PEMANGGILAN FILE FUNGSI
require_once("../app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");
require_once("../app/models/tambah_baca_update_hapus/hitung_data.php");
require_once("../app/models/role_permission/role_permission.php");
require_once("../app/models/hash/hash.php");
require_once("../app/models/hash_password/hash_password.php");
require_once("../app/models/kode_referral/kode_referral.php");
require_once("../app/models/upload_file/upload_file.php");
require_once("../app/models/kompres_gambar/kompres_gambar.php");
require_once("../app/models/lainnya/hitung_saldo.php");
require_once("../app/models/lainnya/angka_romawi.php");
require_once("../app/models/lainnya/format_angka.php");
require_once("../app/models/lainnya/format_tanggal.php");


$Waktu_Sekarang = date("Y-m-d H:i:s");

//PEMANGGILAN CLASS UNTUK HASH ENKRIPSI
$a_hash = new a_hash();
$a_hash_password = new a_hash_password();

//PEMANGGILAN CLASS UNTUK CRUD
$a_tambah_baca_update_hapus = new a_tambah_baca_update_hapus();
$a_hitung_data = new a_hitung_data();

//PEMANGGILAN CLASS UNTUK CRUD
$a_upload_file = new a_upload_file();

//PEMANGGILAN CLASS UNTUK KODE REFERAL
$a_kode_referral = new a_kode_referral();

//PEMANGGILAN CLASS UNTUK KODE REFERAL
$a_hitung_saldo = new a_hitung_saldo();

//PEMANGGILAN CLASS UNTUK KODE REFERAL
$a_format_angka = new a_format_angka();

//PEMANGGILAN CLASS UNTUK KODE REFERAL
$a_role_permission = new a_role_permission();


?>