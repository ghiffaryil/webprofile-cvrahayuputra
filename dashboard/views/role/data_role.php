<?php

//UNTUK MENGAMBIL GET ID SEBAGAI VARIABLE ID PRIMARY
if (isset($_GET['id'])) {
	$Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

/*if((($check_role <> "Administrator")) AND (($check_role <> "Super Administrator"))){
	echo "<script>alert('Anda Tidak Diberikan Akses Untuk Membuka Halaman Ini');document.location.href='?menu=dashboard'</script>";
	exit();
}*/

$Waktu_Simpan_Data = $Waktu_Sekarang;

//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
} else {
	$kehalaman = "?menu=role";
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
	$_POST['Nama_Role'] = trim($_POST['Nama_Role']);

	if (($_POST['Nama_Role'] == "")) {
		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
		$cek_required = "Gagal";
	} else {
		$cek_required = "Sukses";
	}
}
#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {

	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		$edit = $result['Hasil'];

		// ADMIN PANEL PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Admin_Panel", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Admin_Panel = $data['Akses'];
			}
		} else {
			$Cek_Admin_Panel = "";
		}

		// Data_Banner PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Data_Banner", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Data_Banner = $data['Akses'];
			}
		} else {
			$Cek_Data_Banner = "";
		}

		// Tentang_Kami PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Tentang_Kami", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Tentang_Kami = $data['Akses'];
			}
		} else {
			$Cek_Tentang_Kami = "";
		}

		// FAQ PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("FAQ", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_FAQ = $data['Akses'];
			}
		} else {
			$Cek_FAQ = "";
		}

		// Testimoni PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Testimoni", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Testimoni = $data['Akses'];
			}
		} else {
			$Cek_Testimoni = "";
		}

		// Data_Artikel PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Data_Artikel", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Data_Artikel = $data['Akses'];
			}
		} else {
			$Cek_Data_Artikel = "";
		}

		// Data_Galeri PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Data_Galeri", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Data_Galeri = $data['Akses'];
			}
		} else {
			$Cek_Data_Galeri = "";
		}

		// END

	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
	if ($cek_required == "Sukses") {

		$form_field = array("Nama_Role", "Deskripsi_Role", "Waktu_Simpan_Data", "Status");
		$form_value = array("$_POST[Nama_Role]", "$_POST[Deskripsi_Role]", "$Waktu_Sekarang", "Aktif");

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_data_role", $form_field, $form_value);

		if ($result['Status'] == "Sukses") {

			// GET ID ROLE TERAKHIR / TERBARU
			$id_role_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru('tb_data_role', 'Id_Role');
			$id_role_terbaru = $id_role_terbaru['Hasil'][0]['Id_Role'];

			// START MASUKKAN KE DATA ROLE CRUD
			// Admin_Panel PERMISSION
			if (isset($_POST['Admin_Panel'])) {
				$_POST['Admin_Panel'] = "Iya";
			} else {
				$_POST['Admin_Panel'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Admin_Panel");
			$hitung_role_Admin_Panel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Admin_Panel = $hitung_role_Admin_Panel['Hasil'];

			if ($hitung_role_Admin_Panel > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Admin_Panel]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Admin_Panel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Admin_Panel", "", "$_POST[Admin_Panel]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Admin_Panel PERMISSION

			// Data_Banner PERMISSION
			if (isset($_POST['Data_Banner'])) {
				$_POST['Data_Banner'] = "Iya";
			} else {
				$_POST['Data_Banner'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Data_Banner");
			$hitung_role_Data_Banner = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Banner = $hitung_role_Data_Banner['Hasil'];

			if ($hitung_role_Data_Banner > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Banner]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Data_Banner");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Data_Banner", "", "$_POST[Data_Banner]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Banner PERMISSION

			// Tentang_Kami PERMISSION
			if (isset($_POST['Tentang_Kami'])) {
				$_POST['Tentang_Kami'] = "Iya";
			} else {
				$_POST['Tentang_Kami'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Tentang_Kami");
			$hitung_role_Tentang_Kami = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Tentang_Kami = $hitung_role_Tentang_Kami['Hasil'];

			if ($hitung_role_Tentang_Kami > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Tentang_Kami]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Tentang_Kami");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Tentang_Kami", "", "$_POST[Tentang_Kami]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Tentang_Kami PERMISSION

			// FAQ PERMISSION
			if (isset($_POST['FAQ'])) {
				$_POST['FAQ'] = "Iya";
			} else {
				$_POST['FAQ'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "FAQ");
			$hitung_role_FAQ = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_FAQ = $hitung_role_FAQ['Hasil'];

			if ($hitung_role_FAQ > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[FAQ]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "FAQ");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "FAQ", "", "$_POST[FAQ]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// FAQ PERMISSION

			// Testimoni PERMISSION
			if (isset($_POST['Testimoni'])) {
				$_POST['Testimoni'] = "Iya";
			} else {
				$_POST['Testimoni'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Testimoni");
			$hitung_role_Testimoni = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Testimoni = $hitung_role_Testimoni['Hasil'];

			if ($hitung_role_Testimoni > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Testimoni]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Testimoni");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Testimoni", "", "$_POST[Testimoni]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Testimoni PERMISSION

			// Data_Artikel PERMISSION
			if (isset($_POST['Data_Artikel'])) {
				$_POST['Data_Artikel'] = "Iya";
			} else {
				$_POST['Data_Artikel'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Data_Artikel");
			$hitung_role_Data_Artikel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Artikel = $hitung_role_Data_Artikel['Hasil'];

			if ($hitung_role_Data_Artikel > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Artikel]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Data_Artikel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Data_Artikel", "", "$_POST[Data_Artikel]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Artikel PERMISSION

			// Data_Galeri PERMISSION
			if (isset($_POST['Data_Galeri'])) {
				$_POST['Data_Galeri'] = "Iya";
			} else {
				$_POST['Data_Galeri'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Data_Galeri");
			$hitung_role_Data_Galeri = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Galeri = $hitung_role_Data_Galeri['Hasil'];

			if ($hitung_role_Data_Galeri > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Galeri]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Data_Galeri");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$id_role_terbaru", "Data_Galeri", "", "$_POST[Data_Galeri]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Galeri PERMISSION
			// END MASUKKAN KE DATA ROLE CRUD

			echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

	if ($cek_required == "Sukses") {
		$form_field = array("Nama_Role", "Deskripsi_Role");
		$form_value = array("$_POST[Nama_Role]", "$_POST[Deskripsi_Role]");

		$form_field_where = array("Id_Role");
		$form_criteria_where = array("=");
		$form_value_where = array("$Get_Id_Primary");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_data_role", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

		if ($result['Status'] == "Sukses") {

			// START MASUKKAN KE DATA ROLE CRUD

			// Admin_Panel PERMISSION
			if (isset($_POST['Admin_Panel'])) {
				$_POST['Admin_Panel'] = "Iya";
			} else {
				$_POST['Admin_Panel'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Admin_Panel");
			$hitung_role_Admin_Panel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Admin_Panel = $hitung_role_Admin_Panel['Hasil'];

			if ($hitung_role_Admin_Panel > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Admin_Panel]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Admin_Panel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Admin_Panel", "", "$_POST[Admin_Panel]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Admin_Panel PERMISSION

			// Data_Banner PERMISSION
			if (isset($_POST['Data_Banner'])) {
				$_POST['Data_Banner'] = "Iya";
			} else {
				$_POST['Data_Banner'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Data_Banner");
			$hitung_role_Data_Banner = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Banner = $hitung_role_Data_Banner['Hasil'];

			if ($hitung_role_Data_Banner > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Banner]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Data_Banner");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Data_Banner", "", "$_POST[Data_Banner]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Banner PERMISSION

			// Tentang_Kami PERMISSION
			if (isset($_POST['Tentang_Kami'])) {
				$_POST['Tentang_Kami'] = "Iya";
			} else {
				$_POST['Tentang_Kami'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Tentang_Kami");
			$hitung_role_Tentang_Kami = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Tentang_Kami = $hitung_role_Tentang_Kami['Hasil'];

			if ($hitung_role_Tentang_Kami > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Tentang_Kami]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Tentang_Kami");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Tentang_Kami", "", "$_POST[Tentang_Kami]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Tentang_Kami PERMISSION

			// FAQ PERMISSION
			if (isset($_POST['FAQ'])) {
				$_POST['FAQ'] = "Iya";
			} else {
				$_POST['FAQ'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "FAQ");
			$hitung_role_FAQ = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_FAQ = $hitung_role_FAQ['Hasil'];

			if ($hitung_role_FAQ > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[FAQ]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "FAQ");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "FAQ", "", "$_POST[FAQ]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// FAQ PERMISSION

			// Testimoni PERMISSION
			if (isset($_POST['Testimoni'])) {
				$_POST['Testimoni'] = "Iya";
			} else {
				$_POST['Testimoni'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Testimoni");
			$hitung_role_Testimoni = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Testimoni = $hitung_role_Testimoni['Hasil'];

			if ($hitung_role_Testimoni > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Testimoni]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Testimoni");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Testimoni", "", "$_POST[Testimoni]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Testimoni PERMISSION

			// Data_Artikel PERMISSION
			if (isset($_POST['Data_Artikel'])) {
				$_POST['Data_Artikel'] = "Iya";
			} else {
				$_POST['Data_Artikel'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Data_Artikel");
			$hitung_role_Data_Artikel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Artikel = $hitung_role_Data_Artikel['Hasil'];

			if ($hitung_role_Data_Artikel > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Artikel]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Data_Artikel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Data_Artikel", "", "$_POST[Data_Artikel]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Artikel PERMISSION

			// Data_Galeri PERMISSION
			if (isset($_POST['Data_Galeri'])) {
				$_POST['Data_Galeri'] = "Iya";
			} else {
				$_POST['Data_Galeri'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Data_Galeri");
			$hitung_role_Data_Galeri = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Data_Galeri = $hitung_role_Data_Galeri['Hasil'];

			if ($hitung_role_Data_Galeri > 0) {
				$form_field = array("Akses");
				$form_value = array("$_POST[Data_Galeri]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Data_Galeri");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Deskripsi_Modul", "Akses");
				$form_value = array("$Get_Id_Primary", "Data_Galeri", "", "$_POST[Data_Galeri]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Data_Galeri PERMISSION

			// END MASUKKAN KE DATA ROLE CRUD

			echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

	$result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['arsip_data'])) {

	$result = $a_tambah_baca_update_hapus->arsip_data("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_arsip'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_tong_sampah'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['hapus_data_permanen'])) {

	$result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_data_role", "Id_Role", $Get_Id_Primary);
	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

//DATA AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

?>

<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Role Admin</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Role</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">

			<div class="row">

				<div class="col-12">

					<?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if (isset($_GET["tambah"])) { ?>
											<h3>Tambah Data Role</h3>
										<?php } elseif (isset($_GET["edit"])) { ?>
											<h3>Edit Data Role</h3>
										<?php } ?>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<?php if (isset($_GET["edit"])) { ?>
											<script type="text/javascript">
												function konfirmasi_hapus_data_permanen() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_hapus_data_ke_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_arsip_data() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_arsip() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}
											</script>
											<ul class="list-inline" <?php if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																		echo "style='display:none'";
																	} ?>>
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Aktif") { ?>
														<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive"> ARSIPKAN</i></a>
													<?php } elseif ($edit['Status'] == "Terarsip") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive"> AKTIFKAN</i></a>
													<?php } elseif ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive"> RESTORE</i></a>
													<?php } ?>

												</li>
												<li class="list-inline-item"> | </li>
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash"> HAPUS </i></a>
													<?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
														<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash"> HAPUS </i></a>
													<?php } ?>
												</li>

											</ul>
										<?php } ?>
									</div>
								</div>


								<form method="POST" enctype="multipart/form-data">

									<fieldset class="content-group">
										<div class="row">

											<div class="col-md-12"> <br> </div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Nama Role</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Nama_Role" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['Nama_Role'];
																														} elseif (isset($_GET['edit'])) {
																															echo $edit['Nama_Role'];
																														} ?>" <?php if (isset($_GET['edit'])) {
																																																																									if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																																																										echo "disabled";
																																																																									}
																																																																								} ?>>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 control-label">Deskripsi Role</label>
													<div class="col-lg-9">
														<textarea rows="4" class="form-control" name="Deskripsi_Role" <?php if (isset($_GET['edit'])) {
																															if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																echo "disabled";
																															}
																														} ?>><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																				echo $_POST['Deskripsi_Role'];
																																																																			} elseif (isset($_GET['edit'])) {
																																																																				echo $edit['Deskripsi_Role'];
																																																																			} ?></textarea>
													</div>
												</div>

											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Role Permission</label>
													<div class="col-lg-9">
														<table class="table table-hover text-left">

															<!-- DATA ADMIN -->
															<tr>
																<td colspan="3">
																	<h5 class="text-bold">Admin Page</h5>
																</td>
															</tr>
															<tr class="">
																<th>No</th>
																<th>Nama Modul</th>
																<th style="text-align: center;">Akses</th>
															</tr>
															<tr>
																<td>1. </td>
																<td>Admin Panel</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['Admin_Panel'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_Admin_Panel == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="Admin_Panel">
																</td>
															</tr>

															<!-- DATA INFORMASI -->
															<tr>
																<td colspan="3">
																	<h5 class="text-bold">Data Informasi</h5>
																</td>
															</tr>
															<tr class="">
																<th>No</th>
																<th>Nama Modul</th>
																<th style="text-align: center;">Akses</th>
															</tr>
															<tr>
																<td>1. </td>
																<td>Tentang Kami</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['Tentang_Kami'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_Tentang_Kami == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="Tentang_Kami">
																</td>
															</tr>

															<tr>
																<td>3. </td>
																<td>Galeri</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['Data_Galeri'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_Data_Galeri == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="Data_Galeri">
																</td>
															</tr>

															<tr>
																<td>4. </td>
																<td>FAQ</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['FAQ'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_FAQ == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="FAQ">
																</td>
															</tr>

															<tr>
																<td>5. </td>
																<td>Testimoni</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['Testimoni'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_Testimoni == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="Testimoni">
																</td>
															</tr>

															<tr>
																<td>6. </td>
																<td>Artikel</td>
																<td valign="center" align="center">
																	<input align="center" type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																												if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																													echo "disabled checked";
																																												}
																																											} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																																																			if (isset($_POST['Data_Artikel'])) {
																																																																																				echo 'checked';
																																																																																			}
																																																																																		} elseif (isset($_GET['edit'])) {
																																																																																			if ($Cek_Data_Artikel == "Iya") {
																																																																																				echo "checked";
																																																																																			}
																																																																																		} ?> value="Iya" name="Data_Artikel">
																</td>
															</tr>

														</table>
													</div>
												</div>

											</div>
										</div>
									</fieldset>

									<div class="row"><br></div>
									<div class="text-center">
										<?php if (isset($_GET["tambah"])) {  ?>
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php } elseif (isset($_GET["edit"])) { ?>
											<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
										<?php } ?>
										<input type="button" onclick="document.location.href='?menu=role'" class="btn btn-danger" value="BATAL">
									</div>
									<div class="row"><br></div>

								</form>
							</div>
						</div>
					<?php } ?>

					<!-- DATA TABLE -->
					<?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<ul class="list-inline">
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
										</ul>
									</div>
								</div>
								<br>
								<div class="table-responsive">
									<table id="example1" class="table table-bordered" style="width:100%">
										<thead>
											<tr class="bg-light">
												<th style="width: 5%;">No</th>
												<th style="width: 40%;">Nama Role</th>
												<th style="width: 50%;">Deskripsi</th>
												<th style="display:none;">&nbsp;</th>
												<th style="display:none;">&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($_GET['filter_status'])) {
												$filter_status = $_GET['filter_status'];
											} else {
												$filter_status = "Aktif";
											}

											$search_field_where = array("Status");
											$search_criteria_where = array("=");
											$search_value_where = array("$filter_status");
											$search_connector_where = array("ORDER BY Id_Role DESC");

											$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

											$nomor = 0;

											if ($result['Status'] == "Sukses") {
												$data_hasil = $result['Hasil'];

												foreach ($data_hasil as $data) {
													$nomor++; ?>
													<tr>
														<td><?php echo $nomor ?></td>
														<td>
															<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data['Id_Role'], $_GET['menu']); ?>">
																<?php echo $data['Nama_Role'] ?>
															</a>
														</td>
														<td><?php echo $data['Deskripsi_Role'] ?></td>
														<td style="display:none;">&nbsp;</td>
														<td style="display:none;">&nbsp;</td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- PENUTUP DIV -->
				</div>
			</div>
		</section>
	</div>
</div>