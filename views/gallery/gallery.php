<section class="page-title-section" style="position: relative; background-image: url(assets/img/background/pexels-jakub-tabisz-5599172.jpg); background-repeat: no-repeat; background-position:bottom-center; background-size:cover">
	<div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
	<div class="container" style="position: relative; z-index: 2;">
		<div class="page-header">
			<h1>Galeri</h1>
		</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Galeri</li>
		</ol>
	</div>
</section><!--/.page-title-section -->

<!-- portfolio-section start -->
<section class="fleets-wrap">

    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">&nbsp;&nbsp;Galeri Kami</h2>
        </div> <!--section-heading-->
    </div>

    <div class="container">
        <div class="no-padding">
            <div class="col-md-12">
                <div class="owl-carousel fleet-carousel">
                    <?php
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("Aktif");
                    $search_connector_where = array("ORDER BY Id_Galeri ASC");

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_galeri", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                    if ($result['Status'] == "Sukses") {
                        $result_hasil = $result['Hasil'];
                        foreach ($result_hasil as $data_galeri) {
                    ?>
                            <div class="item">
                                <div class="owl-item-thumb">
                                    <img src="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>" alt="" style="height:300px; object-fit:cover">
                                    <div class="owl-item-overlay"></div>
                                    <a class="img-link" href="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>"><img src="assets/img/zoomin.png" alt="+" style="margin-top: 120px;" /></a>
                                </div><!-- owl-item-thumb -->
                                <div class="owl-tem-content">
                                    <h3><a href="#"><?php echo $data_galeri['Judul_Galeri'] ?></a></h3>
                                    <p><?php echo $data_galeri['Keterangan'] ?></p>
                                </div><!-- owl-item-content -->
                            </div><!-- /item -->
                    <?php
                        }
                    }
                    ?>
                </div><!--/.owl-carousel-->

                <!-- owl-carousel-control -->
                <div class="fleet-carousel-navigation slider-control">
                    <span class="prev left"><i class="flaticon-previous11"></i></span>
                    <span class="next right"><i class="flaticon-next15"></i></span>
                </div>

            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!--/.no-padding-->

	<br><br>
</section>
<!-- fleets-wrap end -->