<script>
    function changeLanguage(select) {
        var lang = select.value;
        updateSessionLanguage(lang);
    }

    function updateSessionLanguage(lang) {
        // alert(lang);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/config/function/update_session_language.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Session updated successfully
                    console.log('Session updated to ' + lang);
                } else {
                    // Error updating session
                    console.error('Error updating session: ' + xhr.statusText);
                }
            }
        };
        xhr.send('lang=' + lang);
        window.location.href = window.location.pathname;
    }
</script>

<style>
    .selectlang {
        position: relative;
        background: #f7f7f7;
        border: 0;
        border-radius: 30px;
        padding: 5px;
        cursor: pointer;
    }

</style>


<header class="header">
    <nav class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="call-to-action">
                        <ul class="list-inline">
                            <li><a href="views/#">
                                    <font><?php echo $data_setting_website['Nomor_Telpon'] ?></font>
                                </a></li>
                            <li><a href="views/#">
                                    <font><?php echo $data_setting_website['Email_Customer_Service'] ?></font>
                                </a></li>
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
                            <select class="selectlang" onchange="changeLanguage(this)">
                                <option <?php if($selected_language=="id"){ echo "selected";}?> value="id">Indonesia</option>
                                <option <?php if($selected_language=="en"){ echo "selected";}?> value="en">English</option>
                            </select>

                        </div>

                        <ul class="social-links list-inline pull-right">
                            <li><a href="<?php echo $data_setting_website['URL_Facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $data_setting_website['URL_Instagram'] ?>"><i class="fa fa-youtube"></i></a></li>

                        </ul>
                    </div><!-- /.social-links -->
                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->

    <?php include "navbar.php"; ?>
    <!-- /.container -->
</header>