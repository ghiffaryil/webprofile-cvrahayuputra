<?php 
//UNTUK REDIRECT
if(isset($_GET['url_kembali'])){
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
}else{
	$kehalaman = "?menu=".$_GET['menu'];
}

//UNTUK MENGAMBIL GET ID SEBAGAI VARIABLE ID PRIMARY
if(isset($_GET['id'])){
	$Get_Id_Primary = $a_hash->decode($_GET['id'],$_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){
	$_POST['Nama'] = trim($_POST['Nama']);
	
	if(
		($_POST['Nama'] == "")
	){


		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";

		$cek_required = "Gagal";
	}else{
		$cek_required = "Sukses";
	}
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if(isset($_POST['submit_simpan'])){
	if($cek_required == "Sukses"){

		$form_field = array("Id_Testimoni","Nama","Instansi","Testimoni","Rating","Waktu_Simpan_Data","Status");

		$form_value = array(NULL,"$_POST[Nama]","$_POST[Instansi]","$_POST[Testimoni]","$_POST[Rating]","$Waktu_Sekarang","Aktif");

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_testimoni",$form_field,$form_value);

		if($result['Status'] == "Sukses"){
			$Id_Auto_Increment = $result['Id'];
			//FUNGSI UPLOAD FILE Foto
			if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0){
				$post_file_upload = $_FILES['Foto'];
				$path_file_upload = $_FILES['Foto']['name'];
				$ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
				$nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment,"_Foto")."_".$Id_Auto_Increment."_Foto";
				$folder_penyimpanan_file_upload = "../media/testimoni/";
				$tipe_file_yang_diizikan_file_upload = array("png","gif","jpg","jpeg");
				$maksimum_ukuran_file_upload = 3000000;

				$result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload ,$maksimum_ukuran_file_upload);

				if($result_upload_file['Status'] == "Sukses"){
					$form_field = array("Foto");
					$form_value = array("$nama_file_upload.$ext_file_upload");
					$form_field_where = array("Id_Testimoni");
					$form_criteria_where = array("=");
					$form_value_where = array("$Id_Auto_Increment");
					$form_connector_where = array("");

					$result = $a_tambah_baca_update_hapus->update_data("tb_testimoni",$form_field,$form_value,$form_field_where,$form_criteria_where,$form_value_where,$form_connector_where);
				}else{
				}
			}
			//FUNGSI UPLOAD FILE Foto
			echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
		}else{
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}
	}

}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if(isset($_GET['edit'])){

	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result['Status'] == "Sukses"){
		$edit = $result['Hasil'];
	}
	else{
		echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
	}

}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if(isset($_POST['submit_update']))
{
	if($cek_required == "Sukses")
	{
		$form_field = array("Nama","Instansi","Testimoni","Rating");

		$form_value = array("$_POST[Nama]","$_POST[Instansi]","$_POST[Testimoni]","$_POST[Rating]");

		$form_field_where = array("Id_Testimoni");
		$form_criteria_where = array("=");
		$form_value_where = array("$Get_Id_Primary");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_testimoni",$form_field,$form_value,$form_field_where,$form_criteria_where,$form_value_where,$form_connector_where);

		if($result['Status'] == "Sukses"){
			//FUNGSI UPLOAD FILE Foto
			if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0){
				$post_file_upload = $_FILES['Foto'];
				$path_file_upload = $_FILES['Foto']['name'];
				$ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
				$nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary,"_Foto")."_".$Get_Id_Primary."_Foto";
				$folder_penyimpanan_file_upload = "../media/testimoni/";
				$tipe_file_yang_diizikan_file_upload = array("png","gif","jpg","jpeg");
				$maksimum_ukuran_file_upload = 3000000;

				$result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload ,$maksimum_ukuran_file_upload);

				if($result_upload_file['Status'] == "Sukses"){
					$form_field = array("Foto");
					$form_value = array("$nama_file_upload.$ext_file_upload");
					$form_field_where = array("Id_Testimoni");
					$form_criteria_where = array("=");
					$form_value_where = array("$Get_Id_Primary");
					$form_connector_where = array("");

					$result = $a_tambah_baca_update_hapus->update_data("tb_testimoni",$form_field,$form_value,$form_field_where,$form_criteria_where,$form_value_where,$form_connector_where);
				}else{
				}
			}
			//FUNGSI UPLOAD FILE Foto

			echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
		}else{
			echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
		}
	}

}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if(isset($_GET['hapus_data_ke_tong_sampah'])){

	$result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result['Status'] == "Sukses"){
		echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}

}

if(isset($_GET['arsip_data'])){

	$result = $a_tambah_baca_update_hapus->arsip_data("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result['Status'] == "Sukses"){
		echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
	}

}

if(isset($_GET['restore_data_dari_arsip'])){

	$result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result['Status'] == "Sukses"){
		echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
	}

}

if(isset($_GET['restore_data_dari_tong_sampah'])){

	$result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result['Status'] == "Sukses"){
		echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	}

}

if(isset($_GET['hapus_data_permanen'])){

		// READ DATA
	$result_data = $a_tambah_baca_update_hapus->baca_data_id("tb_testimoni","Id_Testimoni",$Get_Id_Primary);

	if($result_data['Status'] == "Sukses"){
		$data = $result_data['Hasil'];

		$Foto = $data['Foto'];
		$temp_file_location = "../media/testimoni/".$Foto;
		
		//Menghapus File Temporari Diatas
		if(file_exists($temp_file_location)){

			$form_field = array("Foto");
			$form_value = array("");
			
			$form_field_where = array("Id_Testimoni");
			$form_criteria_where = array("=");
			$form_value_where = array("$Get_Id_Primary");
			$form_connector_where = array("");

			$result = $a_tambah_baca_update_hapus->update_data("tb_testimoni",$form_field,$form_value,$form_field_where,$form_criteria_where,$form_value_where,$form_connector_where);

			unlink($temp_file_location);
		}
		//Menghapus File Temporari Diatas
	}
	// READ DATA

	$result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_testimoni","Id_Testimoni",$Get_Id_Primary);
	if($result['Status'] == "Sukses"){
		echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
	}else{
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
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni",$count_field_where,$count_criteria_where,$count_value_where,$count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni",$count_field_where,$count_criteria_where,$count_value_where,$count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni",$count_field_where,$count_criteria_where,$count_value_where,$count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

?>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Data Testimoni</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Testimoni</li>
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
					<?php if((isset($_GET["tambah"])) OR (isset($_GET["edit"]))){ ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if(isset($_GET["tambah"])){ ?>
											<h4>Tambah Testimoni</h4>
										<?php }elseif(isset($_GET["edit"])){ ?>
											<h4>Edit Testimoni</h4>
										<?php } ?>
									</div>	
									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<?php if(isset($_GET["edit"])){ ?>
											<script type="text/javascript">
												function konfirmasi_hapus_data_permanen() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_hapus_data_ke_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_arsip_data() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_arsip() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}
											</script>
											<ul class="list-inline">
												<li class="list-inline-item">
													<?php if($edit['Status'] == "Aktif"){ ?>
														<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"> ARSIPKAN</i></a>
													<?php }elseif($edit['Status'] == "Terarsip"){ ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"> AKTIFKAN</i></a>
													<?php }elseif($edit['Status'] == "Terhapus"){ ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"> RESTORE</i></a>
													<?php } ?>

												</li>
												<li class="list-inline-item"> | </li>
												<li class="list-inline-item">
													<?php if($edit['Status'] == "Terhapus"){ ?>
														<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
													<?php }elseif(($edit['Status'] == "Aktif") OR ($edit['Status'] == "Terarsip")){ ?>
														<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"> HAPUS </i></a>											
													<?php } ?>
												</li>
											</ul>
										<?php } ?>
									</div>
								</div>


								<form method="POST" enctype="multipart/form-data">
									<fieldset class="content-group">
										<div class="row">
											<hr>
											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Nama</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Nama" value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Nama']; }elseif(isset($_GET['edit'])){echo $edit['Nama'];} ?>">
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Instansi</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Instansi" value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Instansi']; }elseif(isset($_GET['edit'])){echo $edit['Instansi'];} ?>">
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Testimoni</label>
													<div class="col-lg-9">
														<textarea class="form-control" name="Testimoni"><?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Testimoni']; }elseif(isset($_GET['edit'])){echo $edit['Testimoni'];} ?></textarea>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Rating</label>
													<div class="col-lg-9">
														<select class="form-select" name="Rating">
															<option value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Rating']; }elseif(isset($_GET['edit'])){echo $edit['Rating'];} ?>"><?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Rating']; }elseif(isset($_GET['edit'])){echo $edit['Rating'];} ?></option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 control-label">Foto</label>
												<div class="col-lg-9">
													<?php 
													if (isset($_GET['edit'])) {
														if($edit['Foto'] <> ""){
															?>
															<img src="../media/testimoni/<?php echo $edit['Foto']  ?>" style="width: 150px; height: auto">
															<br><br>
															<i>Klik choose file jika ingin mengganti gambar</i>
															<?php
														}
													}
													
													?>
													<br>
													<input type="file" name="Foto">
													<br>
													<label>Max Ukuran File 3 MB</label>
												</div>
											</div>
										</div>
									</fieldset>
									
									<div class="text-center">
										<?php if(isset($_GET["tambah"])){  ?>				
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php }elseif(isset($_GET["edit"])){ ?>
											<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
										<?php } ?>
										<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="BATAL">
									</div>
								</form>		
							</div>
						</div>
					<?php } ?>

					<?php if(!((isset($_GET["tambah"])) OR (isset($_GET["edit"])))){ ?>						
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
												<th style="width:4%;">No</th>
												<th style="width:15%;">Nama</th>
												<th style="width:15%;">Instansi</th>
												<th style="width:30%;">Testimoni</th>
												<th style="width:6%;">Rating</th>
												<th style="width:10%;">Foto User</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if(isset($_GET['filter_status'])){
												$filter_status = $_GET['filter_status'];
											}else{
												$filter_status = "Aktif";
											}

											$search_field_where = array("Status");

											$search_criteria_where = array("=");

											$search_value_where = array("$filter_status");

											$search_connector_where = array("");


											$nomor = 0;


											$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

											if($result['Status'] == "Sukses"){
												$data_hasil = $result['Hasil'];

												foreach($data_hasil as $data){ $nomor++; ?>
													<tr>
														<td><?php echo $nomor ?></td>
														<td>
															<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Testimoni"],$_GET['menu']); ?>">
																<?php echo $data['Nama'] ?>
															</a>
														</td>
														<td><?php echo $data['Instansi'] ?></td>
														<td><?php echo $data['Testimoni'] ?></td>
														<td><?php echo $data['Rating'] ?></td>
														<td>
															<?php 
															if($data['Foto'] <> ""){
																?>
																<img src="../media/testimoni/<?php echo $data['Foto']?>" style="width: 100px; height: auto">
																<?php
															}
															?>
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
</div>
