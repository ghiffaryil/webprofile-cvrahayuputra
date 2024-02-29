<?php 
//PEMANGGILAN FILE DATABASE DAN KONFIGURASI
require_once("app/config/database/database.php");
require_once("app/config/konfigurasi/konfigurasi.php");

//PEMANGGILAN FILE FUNGSI
require_once("app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");
require_once("app/models/tambah_baca_update_hapus/hitung_data.php");
require_once("app/models/role_permission/role_permission.php");
require_once("app/models/hash/hash.php");
require_once("app/models/hash_password/hash_password.php");
require_once("app/models/kode_referral/kode_referral.php");
require_once("app/models/upload_file/upload_file.php");
require_once("app/models/kompres_gambar/kompres_gambar.php");
require_once("app/models/lainnya/hitung_saldo.php");
require_once("app/models/lainnya/angka_romawi.php");
require_once("app/models/lainnya/format_angka.php");
require_once("app/models/lainnya/format_tanggal.php");

?>