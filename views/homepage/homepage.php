<style>
    @media (max-width: 800px) {
        .div_foto_tentang_kami {
            padding: 40px 0px;
        }
    }
</style>

<div id="main-carousel" class="carousel slide hero-slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $search_field_where = array("Status");
        $search_criteria_where = array("=");
        $search_value_where = array("Aktif");
        $search_connector_where = array("ORDER BY Id_Banner ASC");

        $result_banner = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_banner", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
        if ($result_banner['Status'] == "Sukses") {

            $data_galeri_banner = $result_banner['Hasil'];
            $first = true; // Flag to track the first item
            foreach ($data_galeri_banner as $data_banner) {
                $activeClass = ($first) ? 'active' : ''; // Add 'active' class only to the first item
        ?>
                <div class="item <?php echo $activeClass; ?>">
                    <img src="dashboard/media/banner/<?php echo $data_banner['Foto_Banner'] ?>?time=<?php echo $Waktu_Sekarang ?>" alt="Hero Slide" style="width: 100%; height: 600px; object-fit: cover; background-position:<?php echo $data_banner['Kategori'] ?>;">
                    <!--Slide Image-->
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.85);"></div>
                    <!-- Overlay with opacity -->
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="animated lightSpeedIn">
                                <font style="color:white">
                                    <?php echo get_selected_language($data_banner['Judul'], $data_banner['Judul_Eng']); ?>
                                </font>
                            </h1>

                            <p class="lead animated lightSpeedIn" style="color:white">
                                <font style="color:white">
                                    <?php echo get_selected_language($data_banner['Deskripsi'], $data_banner['Deskripsi_Eng']); ?>
                                </font>
                            </p>

                            <!-- <a class="btn btn-primary btn-lg animated lightSpeedIn" href="#">WORK WITH US TODAY</a> -->
                        </div>
                        <!--.carousel-caption-->
                    </div>
                </div>
        <?php
                $first = false; // Reset the flag after the first item
            }
        } ?>
        <!--.item-->
    </div>
    <!--.carousel-inner-->

    <!-- Controls -->
    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>

</div>
<!-- #main-carousel-->
<section class="service-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="service-left-box">
                    <div class="section-heading">
                        <h2><?php echo get_selected_language($data_setting_website['Judul_Website'],$data_setting_website['Judul_Website_Eng']); ?></h2>
                    </div> <!--section-header-->

                    <div class="service-intro">
                        <p style="font-size:medium"><?php echo get_selected_language($data_setting_website['Deskripsi_Singkat'],$data_setting_website['Deskripsi_Singkat_Eng']); ?></p>
                    </div><!--/.service-intro-->
                </div><!-- /.service-left-box -->
            </div><!-- /.col -->
            <div class="col-md-8 col-sm-12">
                <div id="" class="" style="padding-top: 55px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="about-us-content">
                                    <h3><?php echo get_selected_language("Visi Kami","Our Vision"); ?></h3>
                                    <div class="about-content-block">
                                        <p style="font-size:larger">
                                        <?php echo get_selected_language($data_tentang_kami['Visi'],$data_tentang_kami['Visi_Eng']); ?>
                                        </p>
                                    </div>

                                    <br>
                                    <h3><?php echo get_selected_language("Motto Kami","Our Motto"); ?></h3>
                                    <div class="about-content-block">
                                        <p style="font-size:larger"><?php echo get_selected_language($data_tentang_kami['Motto'],$data_tentang_kami['Motto_Eng']); ?></p>
                                    </div>
                                </div><!-- /about-us-content -->
                            </div><!--/.col-->

                            <div class="col-sm-4 col-xs-12">
                                <div class="about-us-content">
                                <h3><?php echo get_selected_language("Misi Kami","Our Mission"); ?></h3>
                                    <div class="about-content-block">
                                        <p style="font-size:larger"><?php echo get_selected_language($data_tentang_kami['Misi'],$data_tentang_kami['Misi_Eng']); ?></p>
                                    </div>
                                    <br>
                                </div><!-- /about-us-content -->
                            </div><!-- /.col-->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.carousel -->
            </div><!--/.col-->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<!-- About-us-wrap -->
<section class="">
    <div style="padding: 0 40px 0 50px;">
        <div class="row">
            <div class="col-sm-8">
                <div class="about-us-intro-content">
                    <div class="section-heading">
                        <br><br>
                        <h2 class="section-title"><?php echo get_selected_language($data_setting_website['Judul_Website'],$data_setting_website['Judul_Website_Eng']); ?></h2>
                    </div>
                    <p>
                        <font style="font-size:larger">
                        <?php echo get_selected_language($data_tentang_kami['Sejarah'],$data_tentang_kami['Sejarah_Eng']); ?>
                        </font>
                    </p>
                </div><!--/.about-us-intro-content  -->
            </div><!--/.col-->
            <div class="col-sm-4 text-right">
                <div class="div_foto_tentang_kami">
                    <img src="dashboard/media/tentang_kami/<?php echo $data_tentang_kami['Foto_Tentang_Kami'] ?>?time=<?php echo $Waktu_Sekarang ?>" alt="" style="height:560px; width:uto; object-fit:cover">
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- /About-us-wrap -->

<!-- portfolio-section start -->
<section class="fleets-wrap">

    <div class="container">
        <div class="section-heading">
            <h2 class="section-title"><h3><?php echo get_selected_language("Galeri Kami","Our Gallery"); ?></h3></h2>
        </div> <!--section-heading-->
    </div>

    <div class="container-fluid">
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
                                    <img src="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>?time=<?php echo $Waktu_Sekarang ?>" alt="" style="height:300px; object-fit:cover">
                                    <div class="owl-item-overlay"></div>
                                    <a class="img-link" href="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>?time=<?php echo $Waktu_Sekarang ?>"><img src="assets/img/zoomin.png" alt="+" /></a>
                                </div><!-- owl-item-thumb -->
                                <div class="owl-tem-content">
                                    <h3><a href="#"><?php echo get_selected_language($data_galeri['Judul_Galeri'],$data_galeri['Judul_Galeri_Eng']); ?></a></h3>
                                    <p><?php echo get_selected_language($data_galeri['Keterangan'],$data_galeri['Keterangan_Eng']); ?></p>
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
</section>
<!-- fleets-wrap end -->