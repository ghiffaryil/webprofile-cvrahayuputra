<?php
//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
} else {
	$kehalaman = "?menu=" . $_GET['menu'];
}

if (isset($_GET['id'])) {
	$Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
	$_POST['Username'] = trim($_POST['Username']);
	$_POST['Password'] = trim($_POST['Password']);
	if (isset($_GET['edit'])) {
	} else {
		$_POST['Password'] = trim($_POST['Password']);
	}
	if (isset($_GET['edit'])) {
		if ((($_POST['Username'] == ""))) {
			echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
			$cek_required = "Gagal";
		} else {
			$cek_required = "Sukses";
		}
	} else {
		if ((($_POST['Username'] == ""))) {
			echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
			$cek_required = "Gagal";
		} else {
			$cek_required = "Sukses";
		}
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
	if ($cek_required == "Sukses") {

		$_POST['Password'] = $a_hash_password->hash_password($_POST['Password']);
		$_POST['Nomor_Registrasi'] = "A" . $Waktu_Sekarang_Format_ymdHis . rand(10, 60);

		$form_field = array(
			"Username",
			"Password",
			"Sebagai",
			"Nomor_Registrasi",
			"Email",
			"Nama_Lengkap",
			"Nomor_Handphone",
			"Id_Role",
			"Waktu_Simpan_Data",
			"Status"
		);
		$form_value = array(			
			"$_POST[Username]",
			"$_POST[Password]",
			"$_POST[Sebagai]",
			"$_POST[Nomor_Registrasi]",
			"$_POST[Email]",
			"$_POST[Nama_Lengkap]",
			"$_POST[Nomor_Handphone]",
			"$_POST[Id_Role]",
			"$Waktu_Sekarang",
			"Aktif"
		);

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_admin", $form_field, $form_value);

		if ($result['Status'] == "Sukses") {
			echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {
	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_admin", "Id_Admin", $Get_Id_Primary);
	if ($result['Status'] == "Sukses") {
		$edit = $result['Hasil'];
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
	}
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {
	if ($cek_required == "Sukses") {
		if ($_POST['Password'] <> "") {
			$_POST['Password'] = $a_hash_password->hash_password($_POST['Password']);

			$form_field = array(
				"Username",
				"Password",
				"Sebagai",
				"Email",
				"Nama_Lengkap",
				"Nomor_Handphone",
				"Id_Role"
			);

			$form_value = array(
				"$_POST[Username]",
				"$_POST[Password]",
				"$_POST[Sebagai]",
				"$_POST[Email]",
				"$_POST[Nama_Lengkap]",
				"$_POST[Nomor_Handphone]",
				"$_POST[Id_Role]"
			);
		} else {
			$form_field = array(
				"Username",
				"Sebagai",
				"Email",
				"Nama_Lengkap",
				"Nomor_Handphone",
				"Id_Role"
			);

			$form_value = array(
				"$_POST[Username]",
				"$_POST[Sebagai]",
				"$_POST[Email]",
				"$_POST[Nama_Lengkap]",
				"$_POST[Nomor_Handphone]",
				"$_POST[Id_Role]"
			);
		}

		$form_field_where = array("Id_Admin");
		$form_criteria_where = array("=");
		$form_value_where = array("$Get_Id_Primary");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_admin", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

		if ($result['Status'] == "Sukses") {
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

	$result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_admin", "Id_Admin", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['arsip_data'])) {

	$result = $a_tambah_baca_update_hapus->arsip_data("tb_admin", "Id_Admin", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_arsip'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_admin", "Id_Admin", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_tong_sampah'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_admin", "Id_Admin", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['hapus_data_permanen'])) {

	$result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_admin", "Id_Admin", $Get_Id_Primary);
	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

//DATA AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_admin", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_admin", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_admin", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

?>
<div class="content-wrapper">
	<div class="container-full">
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Data Admin</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Admin</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if (isset($_GET["tambah"])) { ?>
											<h3>Tambah Data Admin</h3>
										<?php } elseif (isset($_GET["edit"])) { ?>
											<h3>Edit Data Admin</h3>
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
											<?php if ($u_Sebagai <> "Super Administrator") { ?>
											<?php } else { ?>
												<ul class="list-inline">
													<li class="list-inline-item">
														<?php if ($edit['Status'] == "Aktif") { ?>
															<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"> ARSIPKAN</i></a>
														<?php } elseif ($edit['Status'] == "Terarsip") { ?>
															<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"> AKTIFKAN</i></a>
														<?php } elseif ($edit['Status'] == "Terhapus") { ?>
															<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"> RESTORE</i></a>
														<?php } ?>

													</li>
													<li class="list-inline-item"> | </li>
													<li class="list-inline-item">
														<?php if ($edit['Status'] == "Terhapus") { ?>
															<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
														<?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
															<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
														<?php } ?>
													</li>
												</ul>
											<?php } ?>
										<?php } ?>
									</div>
								</div>
								<form method="POST" enctype="multipart/form-data">

									<fieldset class="content-group">
										<div class="row">
											<div class="col-md-12">
												<br>
											</div>
											<div class="col-md-6">
												<fieldset>
													<div class="form-group row">
														<label class="col-lg-3 control-label">Username</label>
														<div class="col-lg-9">
															<input <?php if (isset($_GET['edit'])) {
																		echo "readonly";
																	} ?> required type="text" class="form-control" name="Username" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																				echo $_POST['Username'];
																																			} elseif (isset($_GET['edit'])) {
																																				echo $edit['Username'];
																																			} ?>" onkeyup="this.value=this.value.replace(/[^A-Za-z0-9]/g,'');">
														</div>
													</div>


													<div class="form-group row">
														<label class="col-lg-3 control-label">Password</label>
														<div class="col-lg-9">
															<input <?php if ($u_Sebagai <> "Super Administrator") { echo "readonly"; } ?> type="password" class="form-control" name="Password" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {echo $_POST['Password']; } ?>" <?php if (isset($_GET['edit'])) { ?> placeholder="Biarkan kosong jika tidak ingin diganti" <?php } ?>>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 control-label">Sebagai</label>
														<div class="col-lg-9">
															<?php if ($u_Sebagai <> "Super Administrator") { ?>
																<input <?php if ($u_Sebagai <> "Super Administrator") {
																			echo "readonly";
																		} ?> type="text" class="form-control" name="Sebagai" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Sebagai'];
																																	} elseif (isset($_GET['edit'])) {
																																		echo $edit['Sebagai'];
																																	} ?>">
															<?php } else { ?>
																<select class="form-select" name="Sebagai">
																	<option value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																						echo $_POST['Sebagai'];
																					} elseif (isset($_GET['edit'])) {
																						echo $edit['Sebagai'];
																					} ?>"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																								echo $_POST['Sebagai'];
																							} elseif (isset($_GET['edit'])) {
																								echo $edit['Sebagai'];
																							} ?></option>
																	<option value="Super Administrator">Super Administrator</option>
																	<option value="Administrator">Administrator</option>
																</select>
															<?php } ?>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 control-label">Role Permission</label>
														<div class="col-lg-9">
															<select class="form-select" name="Id_Role">
																<?php
																if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_role", "Id_Role", $_POST['Id_Role']);
																	if ($result['Status'] == "Sukses") {
																		$edit_option = $result['Hasil'];
																	} else {
																		$edit_option = null;
																	}
																} elseif (isset($_GET['edit'])) {
																	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_role", "Id_Role", $edit['Id_Role']);
																	if ($result['Status'] == "Sukses") {
																		$edit_option = $result['Hasil'];
																	} else {
																		$edit_option = null;
																	}
																}
																?>

																<option value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																					echo $_POST['Id_Role'];
																				} elseif (isset($_GET['edit'])) {
																					echo $edit['Id_Role'];
																				} ?>"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																							echo $edit_option['Nama_Role'];
																						} elseif (isset($_GET['edit'])) {
																							echo $edit_option['Nama_Role'];
																						} ?></option>

																<?php
																$search_field_where = array("Status");
																$search_criteria_where = array("=");
																$search_value_where = array("Aktif");
																$search_connector_where = array("ORDER BY Nama_Role ASC");

																$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
																if ($result['Status'] == "Sukses") {

																	$data_hasil_selection_box = $result['Hasil'];
																	foreach ($data_hasil_selection_box as $data_selection_box) {
																?>
																		<option value="<?php echo $data_selection_box['Id_Role'] ?>"><?php echo $data_selection_box['Nama_Role'] ?></option>
																	<?php } ?>
																<?php } ?>
															</select>

														</div>
													</div>
												</fieldset>
											</div>
											<div class="col-md-6">
												<fieldset>



													<div class="form-group row">
														<label class="col-lg-3 control-label">Nama Lengkap</label>
														<div class="col-lg-9">
															<input <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> type="text" class="form-control" name="Nama_Lengkap" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																			echo $_POST['Nama_Lengkap'];
																																		} elseif (isset($_GET['edit'])) {
																																			echo $edit['Nama_Lengkap'];
																																		} ?>">
														</div>
													</div>

													<div class="form-group row">
														<label class="col-lg-3 control-label">Email</label>
														<div class="col-lg-9">
															<input <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> type="text" class="form-control" name="Email" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Email'];
																																} elseif (isset($_GET['edit'])) {
																																	echo $edit['Email'];
																																} ?>" onkeyup="this.value=this.value.replace(/[^A-Za-z0-9@_.-]/g,'');">
														</div>
													</div>

													<div class="form-group row">
														<label class="col-lg-3 control-label">Nomor Handphone</label>
														<div class="col-lg-9">
															<input <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> type="text" class="form-control" name="Nomor_Handphone" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																			echo $_POST['Nomor_Handphone'];
																																		} elseif (isset($_GET['edit'])) {
																																			echo $edit['Nomor_Handphone'];
																																		} ?>">
														</div>
													</div>

												</fieldset>
											</div>

										</div>
									</fieldset>

									<div class="row"> <br> </div>
									<div style="text-align: center;">
										<?php if (isset($_GET["tambah"])) {  ?>
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php } elseif (isset($_GET["edit"])) { ?>
											<?php if ($u_Sebagai <> "Super Administrator") { ?>
											<?php } else { ?>
												<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
											<?php } ?>
										<?php } ?>
										<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="BATAL">
									</div>

									<div class="row"> <br> </div>
								</form>
							</div>
						<?php } ?>
						<?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if ($u_Sebagai <> "Super Administrator") { ?>
										<?php } else { ?>
											<a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
										<?php } ?>
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
										<thead class="bg-light">
											<tr>
												<th>No</th>
												<th>Username</th>
												<th>Nama Lengkap</th>
												<th>Nomor Registrasi</th>
												<th>Email</th>
												<th>Nomor Handphone</th>
												<th>Sebagai</th>
												<th>Role Permission (Menu)</th>
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
											$search_connector_where = array("");

											$nomor = 0;

											$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_admin", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

											if ($result['Status'] == "Sukses") {
												$data_hasil = $result['Hasil'];

												foreach ($data_hasil as $data) {
													$nomor++; ?>
													<tr>
														<td><?php echo $nomor ?></td>
														<td>
															<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Admin"], $_GET['menu']); ?>">
																<?php echo $data['Username'] ?>
															</a>
														</td>
														<td><?php echo $data['Nama_Lengkap'] ?></td>
														<td><?php echo $data['Nomor_Registrasi'] ?></td>
														<td><?php echo $data['Email'] ?></td>
														<td><?php echo $data['Nomor_Handphone'] ?></td>
														<td><?php echo $data['Sebagai'] ?></td>
														<td>
															<?php
															$result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_role", "Id_Role", $data['Id_Role']);
															if ($result['Status'] == "Sukses") {
																$data_role = $result['Hasil']['Nama_Role'];
															} else {
																$data_role = " Tidak Ada ";
															}
															echo $data_role;
															?>
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>