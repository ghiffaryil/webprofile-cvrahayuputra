<?php 
//CLASS INTI//
require_once("function.php");

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