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
                    <img src="dashboard/media/banner/<?php echo $data_banner['Foto_Banner'] ?>" alt="Hero Slide" style="width: 100%; height: 600px; object-fit: cover;">
                    <!--Slide Image-->
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.85);"></div>
                    <!-- Overlay with opacity -->
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="animated lightSpeedIn">
                                <font style="color:white"><?php echo $data_banner['Judul'] ?></font>
                                <font style="color:white">Title of Your Product <br>Service or Event</font>
                            </h1>

                            <p class="lead animated lightSpeedIn" style="color:white">
                                <font style="color:white"><?php echo $data_banner['Deskripsi'] ?></font>
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
                        <h2><?php echo $data_setting_website['Judul_Website'] ?></h2>
                    </div> <!--section-header-->

                    <div class="service-intro">
                        <p style="font-size:medium"><?php echo $data_setting_website['Deskripsi_Singkat'] ?></p>
                    </div><!--/.service-intro-->
                </div><!-- /.service-left-box -->
            </div><!-- /.col -->
            <div class="col-md-8 col-sm-12">
                <div id="" class="" style="padding-top: 55px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="about-us-content">
                                    <h3>Visi Kami</h3>
                                    <div class="about-content-block">
                                        <p style="font-size:larger"><?php echo $data_tentang_kami['Visi'] ?></p>
                                    </div>

                                    <br>
                                    <h3>Motto Kami</h3>
                                    <div class="about-content-block">
                                        <p style="font-size:larger"><?php echo $data_tentang_kami['Motto'] ?></p>
                                    </div>
                                </div><!-- /about-us-content -->
                            </div><!--/.col-->

                            <div class="col-sm-4 col-xs-12">
                                <div class="about-us-content">
                                    <h3>Misi Kami</h3>
                                    <div class="about-content-block">

                                        <p style="font-size:larger"><?php echo $data_tentang_kami['Misi'] ?></p>
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
<section class="about-us-wrap" style="background: url(img/service-thumb.jpg) no-repeat;">
    <div style="padding: 0 40px 0 50px;">
        <div class="row">
            <div class="col-sm-6">
                <div class="about-us-intro-content">
                    <div class="section-heading">
                        <br><br>
                        <h2 class="section-title"><?php echo $data_setting_website['Judul_Website'] ?></h2>
                    </div>
                    <p>
                        <font style="font-size:larger"><?php echo $data_tentang_kami['Deskripsi_Tambahan'] ?></font>
                    </p>
                </div><!--/.about-us-intro-content  -->
            </div><!--/.col-->
            <div class="col-sm-6 text-center">
                <div class="div_foto_tentang_kami">
                    <img src="dashboard/media/tentang_kami/<?php echo $data_tentang_kami['Foto_Tentang_Kami'] ?>" alt="" style="height:560px; width:uto; object-fit:cover">
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
            <h2 class="section-title">&nbsp;&nbsp;Galeri Kami</h2>
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
                                    <img src="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>" alt="" style="height:300px; object-fit:cover">
                                    <div class="owl-item-overlay"></div>
                                    <a class="img-link" href="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>"><img src="assets/img/zoomin.png" alt="+" /></a>
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
</section>
<!-- fleets-wrap end -->

<!-- Testimonial-wrap start -->
<section class="testimonial-wrap">
    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">Testimoni Customer</h2>
        </div> <!--section-heading-->
    </div>

    
    <!-- testimonial-carousel-slider -->
<div id="Carousel" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <?php
        $search_field_where = array("Status");
        $search_criteria_where = array("=");
        $search_value_where = array("Aktif");
        $search_connector_where = array("ORDER BY Id_Testimoni ASC");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
        if ($result['Status'] == "Sukses") {
            $result_hasil = $result['Hasil'];
            $first = true; // Flag to track the first item
            foreach ($result_hasil as $data_testimoni) {
                $activeClass = ($first) ? 'active' : '';
                $first = false;
        ?>
                <div class="item <?php echo $activeClass; ?>">
                    <div class="media">
                        <div class="media-left">
                            <div class="item-left-thumb">
                                <img class="img-responsive" src="dashboard/media/testimoni/<?php echo $data_testimoni['Foto']?>" alt="client">
                                <div class="author-info row row-flex row-flex-wrap">
                                    <div class="col-xs-7">
                                        <div class="author-name">
                                            <span><?php echo $data_testimoni['Nama']?></span><small><?php echo $data_testimoni['Instansi']?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->

                        <div class="media-body">
                            <div class="item-right-text">
                                <?php echo $data_testimoni['Testimoni']?>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /item -->
        <?php }
        } ?>
    </div><!-- /carousel-inner -->
</div><!-- /.carousel -->

<script>
    // JavaScript to handle initial 'active' class
    document.addEventListener('DOMContentLoaded', function() {
        var carouselItems = document.querySelectorAll('#Carousel .carousel-inner .item');
        carouselItems.forEach(function(item) {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
            }
        });
        var firstItem = document.querySelector('#Carousel .carousel-inner .item');
        firstItem.classList.add('active');
    });
</script>



    <!-- carousel-controls -->
    <div class="slider-control">
        <a class="left carousel-control" href="#Carousel" data-slide="prev">
            <span class="flaticon-previous11"></span>
        </a>
        <a class="right carousel-control" href="#Carousel" data-slide="next">
            <span class="flaticon-next15"></span>
        </a>
    </div>

</section>
<!-- Testimonial-wrap end -->