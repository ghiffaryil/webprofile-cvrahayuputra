<?php

if (isset($_POST['submit_kirim_newsletter'])) {
    $form_field = array("Email", "Waktu_Simpan_Data", "Status");
    $form_value = array("$_POST[Email]", "$Waktu_Sekarang", "Aktif");

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_newsletter", $form_field, $form_value);

    // echo $result['Status'];
    // exit();
    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Terimakasih telah mengirimkan email anda');</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.reload</script>";
    }
}
#-----------------------------------------------------------------------------------
?>

<!-- footer-widget-section start -->
<section class="footer-widget-section" style="position: relative; background-image: url(assets/img/slider/pexels-maria-ilaria-piras-122588.jpg); background-repeat: no-repeat; background-position:top-center; background-size:cover">
    <div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row">
            <div class="col-sm-4">
                <div class="footer-widget" style="color:white">
                    <h3><?php echo get_selected_language("Tentang Kami", "About Us"); ?></h3>
                    <p style="font-size:larger"><?php echo get_selected_language($data_setting_website['Deskripsi_Singkat'], $data_setting_website['Deskripsi_Singkat_Eng']); ?></p>
                    <br>

                    <address>
                        <strong><?php echo $data_setting_website['Nomor_Telpon'] ?></strong>
                        <br>
                        <a href=""><?php echo $data_setting_website['Email_Customer_Service'] ?></a>
                        <br>
                        <br>
                        <span class="map-marker" style="font-size:larger"><?php echo $data_setting_website['Alamat_Lengkap'] ?></span>
                    </address>


                </div><!-- /.footer-widget -->
            </div><!-- /.col-sm-4 -->

            <div class="col-sm-4">
                <div class="footer-widget" style="color:white">
                    <h3>Menu</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="quick-links">
                                <li><a style="color:white" href="?menu=about"><?php echo get_selected_language("Tentang Kami", "About Us"); ?></a></li>
                                <li><a style="color:white" href="?menu=services"><?php echo get_selected_language("Layanan", "Services"); ?></a></li>
                                <li><a style="color:white" href="?menu=gallery"><?php echo get_selected_language("Galeri", "Gallery"); ?></a></li>
                                <li><a style="color:white" href="?menu=contact"><?php echo get_selected_language("Kontak", "Contact Us"); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-4 -->

            <div class="col-sm-4">
                <div class="footer-widget" style="color:white">
                    <h3><?php if ($_SESSION['lang'] == "id") {
                            echo "Hubungi Kami";
                        } else {
                            echo "Contact Us";
                        } ?></h3>
                    <p><?php if ($_SESSION['lang'] == "id") {
                            echo "Masukkan email anda untuk mendapatkan pembaharuan informasi dari kami";
                        } else {
                            echo "Enter your email to get updated information from us";
                        } ?></p>

                    <form class="newsletter-form" method="POST" action="">
                        <div class="form-group">
                            <label class="sr-only" for="InputEmail1">Email</label>
                            <input type="email" name="Email" class="form-control" id="InputEmail1" placeholder="Masukkan Email">
                            <button type="submit" name="submit_kirim_newsletter" class="btn">Send &nbsp;<i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                    <ul class="social-links list-inline" style="display:none">
                        <li><a class="facebook" href="<?php echo $data_setting_website['URL_Facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="<?php echo $data_setting_website['URL_Twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube" href="<?php echo $data_setting_website['URL_Youtube'] ?>"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.cta-section -->
<!-- footer-widget-section end -->

<!-- copyright-section start -->
<footer class="copyright-section">
    <div class="container">
        <div class="copyright-info">
            <!-- <span>Copyright © 2015 Unship. All Rights Reserved. Designed by <a href="https://uiCookies.com">uiCookies</a><br> Proudly powered by <a href="http://www.w3schools.com/html/html5_intro.asp">HTML5</a> and <a href="getbootstrap.com">Bootstrap3</a></span> -->
            <span style="color:white">Copyright © 2024 by Rahayu Putra. All Right Reserved</span>
        </div>
    </div><!-- /.container -->
</footer>