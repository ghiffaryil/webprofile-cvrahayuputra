<header class="header">
    <nav class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="call-to-action">
                        <ul class="list-inline">
                            <li><a href="views/#"><font><?php echo $data_setting_website['Nomor_Telpon']?></font></a></li>
                            <li><a href="views/#"><font><?php echo $data_setting_website['Email_Customer_Service']?></font></a></li>
                        </ul>
                    </div><!-- /.call-to-action -->
                </div><!-- /.col-sm-6 -->

                <div class="col-sm-4 col-xs-12">
                    <div class="logo text-center">
                        <h3><img src="assets/img/logo/cvrp2horizontal.png" style="height: 80px;" alt=""> </h3>
                    </div>
                </div>

                <div class="col-sm-4 hidden-xs">
                    <div class="topbar-right">
                        <div class="lang-support pull-right">
                            <select class="lang-select">
                                <option value="indonesia" data-class="flag-indonesia">Indonesia</option>
                                <option value="united-kingdom" data-class="flag-uk">English</option>
                            </select>
                        </div>

                        <ul class="social-links list-inline pull-right">
                            <li><a href="<?php echo $data_setting_website['URL_Facebook']?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $data_setting_website['URL_Instagram']?>"><i class="fa fa-youtube"></i></a></li>
                            
                        </ul>
                    </div><!-- /.social-links -->
                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->

    <?php include "navbar.php"; ?>
    <!-- /.container -->
</header>