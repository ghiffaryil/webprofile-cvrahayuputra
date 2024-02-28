<?php 

date_default_timezone_set('Asia/Jakarta');

//PENGATURAN UNTUK AMBIL LINK
// $Link_Website = "https://cvrahayuputra.com/";
$Link_Website = "http://127.0.0.1/cvrahayuputra/";
$Link_Sekarang = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//PENGATURAN UNTUK AMBIL LINK

$Waktu_Sekarang = date("Y-m-d H:i:s");
$Waktu_Sekarang_Format_ymdHis = date("ymdHis");

$Email_SMTP_1 = "notification@cvrahayuputra.com";
$Password_Email_SMTP_1 = "SuksesBersama2022";
$Nama_SMTP_1 = "CV Rahayu Putra";
$Port_SMTP_1 = 587;
$Host_SMTP_1 = "srv72.niagahoster.com";


 ?>