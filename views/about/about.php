<style>
	.accordion-item {
		border-bottom: 2px solid #ccc;
		/* padding: 15px 0 0 0; */
	}

	.accordion-title {
		/* background-color: gray; */
		padding: 15px 15px 25px 15px;
		font-size: large;
		cursor: pointer;
		color:#140707
	}

	.accordion-content {
		padding: 15px 5px 25px 15px;
		display: none;
		/* background-color: #fff; */
	}

	.accordion-content p {
		margin: 0;
	}
</style>

<section class="page-title-section" style="position: relative; background-image: url(assets/img/background/pexels-jakub-tabisz-5599172.jpg); background-repeat: no-repeat; background-position:top-center; background-size:cover">
    <div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="page-header">
            <h1>Tentang Kami</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Tentang Kami</li>
        </ol>
    </div>
</section><!--/.page-title-section -->

<!--about-us-intro-wrap  -->
<section class="about-us-intro-wrap">
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-sm-4">
				<div class="about-thumb">
					<img class="img-responsive" src="dashboard/media/tentang_kami/<?php echo $data_tentang_kami['Foto_Tentang_Kami'] ?>" alt="thumb">
				</div>
			</div><!-- /.col -->

			<div class="col-sm-8">
				<div class="about-us-intro-content">
					<div class="section-heading">
						<h2 class="section-title"><?php echo $data_setting_website['Judul_Website'] ?></h2>
					</div>
					<p style="font-size:larger"><?php echo $data_setting_website['Deskripsi_Singkat'] ?></p>
					<br>
					<p style="font-size:larger"><?php echo $data_setting_website['Deskripsi_Lengkap'] ?></p>
					<br>
				</div><!--/.about-us-intro-content  -->

			</div><!--/.col-->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!--/.about-us-intro-wrap  -->

<!-- about-us-advantage-wrap -->
<section class="about-us-advantage-wrap">
	<br><br>
	<div style="padding: 0 45px 0 55px;">
		<div class="row">
			<div class="col-md-8 col-sm-7 col-xs-12">
				<div class="advantage-left-content">
					<div class="section-heading">
						<h2 class="section-title">Bekerja Bersama Kami</h2>
					</div>
					<p><?php echo $data_tentang_kami['Deskripsi_Tambahan'] ?></p>
					<br>
					<div>
						<h3>Motto Kami</h3>
						<blockquote><i>
								<h2 class="text-muted"><?php echo $data_tentang_kami['Motto'] ?></h2>
							</i></blockquote>
					</div>
					<br>
					<br>
				</div><!-- /.advantage-left-content -->
			</div><!-- /.col -->
			<div class="col-md-4 col-sm-5 col-xs-12">
				<div class="advantage-right-content">
					<div>
						<h3>Visi Kami</h3>
						<p style="font-size:larger"><?php echo $data_tentang_kami['Visi'] ?></p>
					</div>
					<div>
						<h3>Misi Kami</h3>
						<p style="font-size:larger"><?php echo $data_tentang_kami['Misi'] ?></p>
					</div>

				</div><!-- /.advantage-right-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!-- /.about-us-advantage-wrap -->

<!-- team-wrap-->
<!-- <hr> -->
<section class="team-wrap" style="background:white">
	<div class="" style="padding: 0 45px 50px 45px;">
		<br>
		<div class="row">
			<div class="col-lg-4 text-center">
				<div class="section-heading"> <br><br>
				<h2 class="section-title">Frequently Asked Question (FAQ)?</h2>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="accordion">

					<?php
					$search_field_where = array("Status");
					$search_criteria_where = array("=");
					$search_value_where = array("Aktif");
					$search_connector_where = array("ORDER BY Id_Faq ASC");

					$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_faq", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
					if ($result['Status'] == "Sukses") {

						$data_hasil = $result['Hasil'];
						foreach ($data_hasil as $data_faq) {
					?>

							<div class="accordion-item">
								<div class="accordion-title">
									<div class="row">
										<div class="col-lg-10">
											<p class="text-dark"><?php echo $data_faq['Pertanyaan'] ?></p>
										</div>
										<div class="col-lg-2 text-right">
											<span class="accordion-icon"><i class="fa fa-plus-circle"></i></span></div>
										</div>
									</div>
								<div class="accordion-content">
									<p class="text-muted">
										<font style="font-size:larger">
										<?php echo $data_faq['Jawaban'] ?>
										</font>
									</p>
								</div>
							</div>

					<?php
						}
					}
					?>
					<!-- Add more accordion items as needed -->
				</div>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!-- /.team-wrap -->

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var accordionItems = document.querySelectorAll('.accordion-item');

		accordionItems.forEach(function(item) {
			item.addEventListener('click', function() {
				// Toggle the display of accordion content
				var content = this.querySelector('.accordion-content');
				content.style.display = (content.style.display === 'block') ? 'none' : 'block';

				// Change the background color of the title when content is shown/hidden
				var title = this.querySelector('.accordion-title');
				title.classList.toggle('active');
			});
		});
	});
</script>