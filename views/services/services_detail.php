<?php
if (isset($_GET["service_id"])) {
	$Get_Id_Primary = $a_hash->decode($_GET['service_id'], $_GET['menu']);
	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_pelayanan", "Id_Pelayanan", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		$edit = $result['Hasil'];
	} else {
		// echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='index.php?menu=services'</script>";
	}
}
?>

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

<!-- Single-Service-Start -->
<section class="single-service-wrap">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="single-service-content">
					<div class="single-service-thumb">
						<img src="dashboard/media/pelayanan/cover/<?php echo $edit['Cover_Pelayanan'] ?>?time=<?php echo $Waktu_Sekarang ?>" alt="image" style="max-width: 500px; object-fit:cover" />
					</div>
				</div><!-- /.single-service-content -->
			</div><!-- /.col -->
			<div class="col-sm-6">
				<h2><?php echo $edit['Judul_Pelayanan'] ?></h2>
				<p><?php echo $edit['Deskripsi'] ?></p><br>
				<br>
				<br>
			</div>
			<div class="col-sm-2">
				<div class="sidebar-wrapper">
					<div class="widget">
						<h2 class="widget-title">Services</h2>
						<ul class="service-list widget-arrow-list">
							<?php
							$search_field_where = array("Status");
							$search_criteria_where = array("=");
							$search_value_where = array("Aktif");
							$search_connector_where = array("");
							$nomor = 0;
							$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pelayanan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

							if ($result['Status'] == "Sukses") {
								$data_hasil = $result['Hasil'];

								foreach ($data_hasil as $data) {
									$nomor++;
							?>
									<li><a href="?menu=services-detail&service_id=<?php echo $a_hash->encode($data['Id_Pelayanan'], 'services') ?>"><?php echo $data['Judul_Pelayanan'] ?></a></li>
							<?php }
							} ?>
						</ul>
					</div><!-- /.widget -->
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!-- Single-Service-End-->