<?php
include "config/master.php";
//FUNGSI LOGIN

setcookie("Cookie_1_CVRahayuPutra", "", time() + (86400 * 365));
setcookie("Cookie_2_CVRahayuPutra", "", time() + (86400 * 365));
setcookie("Cookie_3_CVRahayuPutra", "", time() + (86400 * 365));

unset($_COOKIE["Cookie_1_CVRahayuPutra"]);
unset($_COOKIE["Cookie_2_CVRahayuPutra"]);
unset($_COOKIE["Cookie_3_CVRahayuPutra"]);

if (isset($_POST['submit_login'])) {

	$_POST['Password'] = $a_hash_password->hash_password($_POST['Password']);
	$search_field_where = array("Status", "Username", "Password");
	$search_criteria_where = array("=", "=", "=");
	$search_value_where = array("Aktif", "$_POST[Username]", "$_POST[Password]");
	$search_connector_where = array("AND", "AND", "");
	$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_admin", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

	if ($result['Status'] == "Sukses") {
		$data_login = $result['Hasil'];
		$Id_User = $a_hash->encode($data_login[0]['Id_Admin'], "Id_Admin");
		$Login_Sebagai = $a_hash->encode("Admin", "Login_Sebagai");
		$Password = $a_hash->encode($data_login[0]['Password'], "Password");

		setcookie("Cookie_1_CVRahayuPutra", $Id_User, time() + (86400 * 365)); //LOGIN ID_PENGGUNA
		setcookie("Cookie_2_CVRahayuPutra", $Password, time() + (86400 * 365)); //LOGIN PASSWORD
		setcookie("Cookie_3_CVRahayuPutra", $Login_Sebagai, time() + (86400 * 365)); //LOGIN SEBAGAI

		echo "<script>alert('Login Berhasil');document.location.href='dashboard.php'</script>";
	} else {
		echo "<script>alert('Username atau Password Salah');document.location.href='$Link_Sekarang'</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../media/logo/TM.png">

	<title>CV Rahayu Putra</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">

	<!-- Style-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/front-end-img/banners/bgadmin.jpg)">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">CV Rahayu Putra</h2>
								<p class="mb-0">Silahkan Login Menggunakan Akun Yang Sudah Terdaftar</p>
							</div>
							<div class="p-40">
								<form method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input name="Username" type="text" class="form-control ps-15 bg-transparent" placeholder="Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input name="Password" type="password" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									<div class="row">

										<div class="col-12 text-center">
											<button type="submit" name="submit_login" class="btn btn-primary mt-10">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
	<script src="assets/icons/feather-icons/feather.min.js"></script>

</body>
</html>