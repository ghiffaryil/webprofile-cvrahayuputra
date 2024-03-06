<?php
//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
} else {
	$kehalaman = "?menu=" . $_GET['menu'];
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
	$_POST['Misi'] = trim($_POST['Misi']);
	$_POST['Visi'] = trim($_POST['Visi']);
	$_POST['Motto'] = trim($_POST['Motto']);

	if (
		($_POST['Misi'] == "") or
		($_POST['Visi'] == "") or
		($_POST['Motto'] == "")
	) {
		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
		$cek_required = "Gagal";
	} else {
		$cek_required = "Sukses";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
$result = $a_tambah_baca_update_hapus->baca_data_id("tb_tentang_kami", "Id_Tentang_Kami", "1");
if ($result['Status'] == "Sukses") {
	$edit = $result['Hasil'];
} else {
	$edit = null;
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {
	if ($cek_required == "Sukses") {
		$form_field = array(
			"Visi",
			"Misi",
			"Motto",
			"Sejarah",

			"Visi_Eng",
			"Misi_Eng",
			"Motto_Eng",
			"Sejarah_Eng",

			"Waktu_Simpan_Data",
			"Status"
		);
		$form_value = array(
			"$_POST[Visi]",
			"$_POST[Misi]",
			"$_POST[Motto]",
			"$_POST[Sejarah]",

			"$_POST[Visi_Eng]",
			"$_POST[Misi_Eng]",
			"$_POST[Motto_Eng]",
			"$_POST[Sejarah_Eng]",

			"$Waktu_Sekarang",
			"Aktif"
		);

		$form_field_where = array("Id_Tentang_Kami");
		$form_criteria_where = array("=");
		$form_value_where = array("1");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_tentang_kami", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where, "Iya");

		if ($result['Status'] == "Sukses") {

			//FUNGSI UPLOAD FILE Foto_Tentang_Kami
			if ($_FILES['Foto_Tentang_Kami']['size'] <> 0 && $_FILES['Foto_Tentang_Kami']['error'] == 0) {
				$post_file_upload = $_FILES['Foto_Tentang_Kami'];
				$path_file_upload = $_FILES['Foto_Tentang_Kami']['name'];
				$ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
				$nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "Foto_Tentang_Kami") . "_" . $Id_Auto_Increment . "Foto_Tentang_Kami";
				$folder_penyimpanan_file_upload = "media/tentang_kami/";
				$tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
				$maksimum_ukuran_file_upload = 3000000;

				$result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

				if ($result_upload_file['Status'] == "Sukses") {
					$form_field = array("Foto_Tentang_Kami");
					$form_value = array("$nama_file_upload.$ext_file_upload");
					$form_field_where = array("Id_Tentang_Kami");
					$form_criteria_where = array("=");
					$form_value_where = array("1");
					$form_connector_where = array("");

					$result = $a_tambah_baca_update_hapus->update_data("tb_tentang_kami", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
				} else {
				}
			}

			echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------
?>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Tentang Kami</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
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
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<h3>Tentang Kami</h3>
								</div>
							</div>

							<form method="POST" enctype="multipart/form-data">

								<fieldset class="content-group">
									<div class="row">
										<div class="col-md-12">
											<fieldset>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Visi</label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="3" name="Visi"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																												echo $_POST['Visi'];
																											} else {
																												echo $edit['Visi'];
																											} ?></textarea>
													</div>
													
													<label class="col-lg-2 control-label"><i>Vision (en)</i></label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="3" name="Visi_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																												echo $_POST['Visi_Eng'];
																											} else {
																												echo $edit['Visi_Eng'];
																											} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Misi</label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="6" name="Misi"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																												echo $_POST['Misi'];
																											} else {
																												echo $edit['Misi'];
																											} ?></textarea>
													</div>

													<label class="col-lg-2 control-label"><i>Mision (en)</i></label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="6" name="Misi_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																												echo $_POST['Misi_Eng'];
																											} else {
																												echo $edit['Misi_Eng'];
																											} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Motto</label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="1" name="Motto"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																													echo $_POST['Motto'];
																												} else {
																													echo $edit['Motto'];
																												} ?></textarea>
													</div>
													
													<label class="col-lg-2 control-label"><i>Motto (en)</i></label>
													<div class="col-lg-4">
														<textarea class="form-control" rows="1" name="Motto_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																													echo $_POST['Motto_Eng'];
																												} else {
																													echo $edit['Motto_Eng'];
																												} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<hr>
													<label class="col-lg-2 control-label">Sejarah</label>
													<div class="col-lg-10">
														<textarea class="form-control" rows="5" name="Sejarah"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Sejarah'];
																															} else {
																																echo $edit['Sejarah'];
																															} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label"><i>History (en)</i></label>
													<div class="col-lg-10">
														<textarea class="form-control" rows="5" name="Sejarah_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Sejarah_Eng'];
																															} else {
																																echo $edit['Sejarah_Eng'];
																															} ?></textarea>
													</div>
												</div>


												<div class="form-group row">
													<label class="col-lg-2 control-label">Foto</label>
													<div class="col-lg-10">

														<img src="media/tentang_kami/<?php echo $edit['Foto_Tentang_Kami']; ?>?time=<?php echo $Waktu_Sekarang ?>" style="width: 300px; height: auto">
														<br><br>
														<i>Klik choose file jika ingin mengganti gambar</i>

														<br>
														<input type="file" name="Foto_Tentang_Kami">
														<br>
														<label>Max Ukuran File 3 MB</label>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</fieldset>


								<div class="row"> <br> </div>

								<div style="text-align: center;">
									<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
									<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="BATAL">
								</div>

								<div class="row"> <br> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>