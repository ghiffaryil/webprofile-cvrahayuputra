<?php

if (isset($_POST['submit_simpan'])) {
	$form_field = array("Nama", "Instansi", "Pesan", "Email", "Nomor_Handphone", "Waktu_Simpan_Data", "Status");
	$form_value = array("$_POST[Nama]", "$_POST[Instansi]", "$_POST[Pesan]", "$_POST[Email]", "$_POST[Nomor_Handphone]", "$Waktu_Sekarang", "Aktif");

	$result = $a_tambah_baca_update_hapus->tambah_data("tb_kontak", $form_field, $form_value);

	// echo $result['Status'];
	// exit();
	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Sukses');</script>";
	} else {
		echo "<script>alert('Opps, Ada kesalahan!');document.location.reload</script>";
	}
}
#-----------------------------------------------------------------------------------
?>

<section class="page-title-section" style="position: relative; background-image: url(assets/img/background/bgbanner.jpg); background-repeat: no-repeat; background-position:bottom-center; background-size:cover">
	<div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
	<div class="container" style="position: relative; z-index: 2;">
		<div class="page-header">
			<h1><?php echo get_selected_language("Kontak Kami", "Contact Us"); ?></h1>
		</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active"><?php echo get_selected_language("Kontak Kami", "Contact Us"); ?></li>
		</ol>
	</div>
</section><!--/.page-title-section -->

<!-- contact-wrap -->
<section class="contact-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<br><br>
				<div class="">
					<iframe src="https://www.google.com/maps/embed?pb=<?php echo $data_setting_website['Embed_Google_Maps'] ?>" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div><!-- /.col -->
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-6">
						<div class="office-locations" style="margin-top:30px;">
							<hr>
							<h1><?php echo get_selected_language("Kontak Kami", "Contact Us"); ?></h1>
							<div class="office-address">
								<address>
									<b><?php echo get_selected_language("Kantor Utama", "Office"); ?></b>
									<span style="font-size:larger"><?php echo $data_setting_website['Alamat_Lengkap'] ?></span>
									<br>
									<b><?php echo get_selected_language("Telepon", "Phone"); ?></b>
									<span style="font-size:larger"><?php echo $data_setting_website['Nomor_Telpon'] ?> </span>
									<br>
									<b><?php echo get_selected_language("Email", "Email"); ?></b>
									<span style="font-size:larger"><a href="#" class="text-muted"><?php echo $data_setting_website['Email_Admin'] ?></a> </span>
								</address>
							</div><!-- /.row -->
						</div><!-- /.office-locations -->
					</div>
					<div class="col-lg-6">
						<div class="office-locations" style="margin-top:30px;">
							<hr>
							<div class="send-feedback">
								<h1><?php echo get_selected_language("Kirim Pesan", "Send Feedback"); ?></h1>
								<form id="" method="POST" action="">
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<div class="">
												<label for="name"><?php echo get_selected_language("Nama", "Name"); ?>*</label>
												<input id="name" name="Nama" type="text" class="form-control" required="" placeholder="">
											</div>
										</div><!-- /.col -->

										<div class="col-sm-6 col-xs-12">
											<div class="">
												<label for="name"><?php echo get_selected_language("Instansi", "Organization"); ?>*</label>
												<input id="name" name="Instansi" type="text" class="form-control" required="" placeholder="">
											</div>
										</div>


										<div class="col-sm-6 col-xs-12">
											<div class=""> <br>
												<label for="name"><?php echo get_selected_language("Nomor Handphone", "Mobile"); ?>*</label>
												<input id="name" name="Nomor_Handphone" type="number" class="form-control" required="" placeholder="">
											</div>
										</div>

										<div class="col-sm-6 col-xs-12">
											<div class=""> <br>
												<label for="email">Email*</label>
												<input id="email" name="Email" type="email" class="form-control" required="" placeholder="">
											</div>
										</div>

										<div class="col-sm-12 col-xs-12">
											<div class=""><br>
												<label><?php echo get_selected_language("Pesan", "Message"); ?>*</label>
												<textarea id="message" name="Pesan" class="form-control" required="" placeholder="" style="height: 100px;"></textarea>
											</div>
										</div><!-- /.col -->
									</div><!-- /.row -->

									<br>
									<div class="form-group">
										<button type="submit" name="submit_simpan" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div><!-- /.send-feedback -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.container -->
</section>
<!-- /contact-wrap -->