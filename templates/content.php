		<!-- Main content -->
		<?php if(($cek_login_Login_Sebagai == "Admin")){ ?>
		<?php include "master/inti/halaman.php" ?>
		<?php include "master/modul/dashboard_admin/halaman.php" ?>
		<?php } ?>

		<?php if(($cek_login_Login_Sebagai == "Siswa")){ ?>
		<?php include "master/modul/dashboard_siswa/halaman.php" ?>
		<?php } ?>

		<?php if(($cek_login_Login_Sebagai == "Marketing")){ ?>
		<?php include "master/modul/dashboard_marketing/halaman.php" ?>
		<?php } ?>

		<?php if(($cek_login_Login_Sebagai == "Tentor")){ ?>
		<?php include "master/modul/dashboard_tentor/halaman.php" ?>
		<?php } ?>

		<?php if(($cek_login_Login_Sebagai == "Wali_Kelas")){ ?>
		<?php include "master/modul/dashboard_wali_kelas/halaman.php" ?>
		<?php } ?>

		<?php if(($cek_login_Login_Sebagai == "Developer")){ ?>
		<?php include "master/modul/dashboard_developer/halaman.php" ?>
		<?php } ?>
		<!-- /.content -->
