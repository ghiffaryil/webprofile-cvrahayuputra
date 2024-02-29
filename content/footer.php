<!-- footer-widget-section start -->
<section class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="footer-widget">
                    <h3>Tentang</h3>
                    <p style="font-size:larger"><?php echo $data_setting_website['Deskripsi_Singkat']?></p>
                    <br>

                    <address>
                        <strong><?php echo $data_setting_website['Nomor_Telpon']?></strong>
                        <br>
                        <a href=""><?php echo $data_setting_website['Email_Customer_Service']?></a>
                        <br>
                        <br>
                        <span class="map-marker" style="font-size:larger"><?php echo $data_setting_website['Alamat_Lengkap']?></span>
                    </address>


                </div><!-- /.footer-widget -->
            </div><!-- /.col-sm-4 -->

            <div class="col-sm-4">
                <div class="footer-widget">
                    <h3>Menu</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="quick-links">
                                <li><a href="?menu=about">About us</a></li>
                                <li><a href="?menu=services">Services</a></li>
                                <li><a href="?menu=gallery">Gallery</a></li>
                                <li><a href="?menu=blog">Blog</a></li>
                                <li><a href="?menu=contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-4 -->

            <div class="col-sm-4">
                <div class="footer-widget">
                    <h3>Hubungi Kami</h3>
                    <p>Masukkan email anda untuk mendapatkan pembaharuan informasi dari kami</p>

                    <form class="newsletter-form">
                        <div class="form-group">
                            <label class="sr-only" for="InputEmail1">Alamat Email</label>
                            <input type="email" class="form-control" id="InputEmail1" placeholder="Masukkan Email">
                            <button type="submit" class="btn">Kirim &nbsp;<i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                    <ul class="social-links list-inline">
                        <li><a class="facebook" href="<?php echo $data_setting_website['URL_Facebook']?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="<?php echo $data_setting_website['URL_Twitter']?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube" href="<?php echo $data_setting_website['URL_Youtube']?>"><i class="fa fa-youtube"></i></a></li>
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
        <!-- <div class="footer-menu">
            <ul>
                <li><a href="views/#">Privacy &amp; Cookies</a></li>
                <li><a href="views/#">Terms &amp; Conditions</a></li>
                <li><a href="views/#">Accessibility</a></li>
            </ul>
        </div> -->
        <div class="copyright-info">
            <!-- <span>Copyright © 2015 Unship. All Rights Reserved. Designed by <a href="https://uiCookies.com">uiCookies</a><br> Proudly powered by <a href="http://www.w3schools.com/html/html5_intro.asp">HTML5</a> and <a href="getbootstrap.com">Bootstrap3</a></span> -->
            <span>Copyright © 2024 CV. Rahayu Putra</span>
        </div>
    </div><!-- /.container -->
</footer>