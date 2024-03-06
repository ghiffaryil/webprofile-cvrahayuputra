<section class="page-title-section" style="position: relative; background-image: url(assets/img/background/bgbanner.jpg); background-repeat: no-repeat; background-position:bottom-center; background-size:cover">
	<div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
	<div class="container" style="position: relative; z-index: 2;">
		<div class="page-header">
			<h1>Layanan Kami</h1>
		</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Layanan Kami</li>
		</ol>
	</div>
</section><!--/.page-title-section -->

<!-- Featured-service-start -->
<section class="featured-service">
	<div class="container" style="padding:40px 0">
		<div class="section-heading">
			<h2 class="section-title">Layanan Kami</h2>
		</div>
		<div class="row">

			<?php
			$search_field_where = array("Status");
			$search_criteria_where = array("=");
			$search_value_where = array("Aktif");
			$search_connector_where = array("ORDER BY Id_Pelayanan ASC");

			$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pelayanan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
			if ($result['Status'] == "Sukses") {

				$data_hasil = $result['Hasil'];
				foreach ($data_hasil as $data_pelayanan) {
			?>

					<div class="col-sm-4">
						<div class="featured-service">
							<div class="featured-service-thumb">
								<img class="img-responsive" src="dashboard/media/pelayanan/cover/<?php echo $data_pelayanan['Cover_Pelayanan']?>?time=<?php echo $Waktu_Sekarang?>" alt="image" style="height:600px; object-fit:cover">
							</div>
							<div class="featured-service-content"><br>
								<h3><?php echo $data_pelayanan['Judul_Pelayanan']?></h3>
								<p><?php echo substr($data_pelayanan['Deskripsi'], 0, 100)?>...</p>
								<br><a class="btn btn-primary readmore" href="?menu=services-detail&service_id=<?php echo $a_hash->encode($data_pelayanan['Id_Pelayanan'],$_GET['menu'])?>">Lanjutkan<i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>

					</div><!-- /.col -->

			<?php
				}
			}
			?>

		</div><!-- /.row -->
		<br>
	</div><!-- /.container -->

</section>
<!-- Featured-service-end -->