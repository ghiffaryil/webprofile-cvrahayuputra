<style>
    .div-toggle-navigation {
        display: none;
    }

    .div-translate {
        display: none;
    }

    @media only screen and (max-width: 920px) {
        .div-toggle-navigation {
            display: block;
        }
    }

    @media only screen and (max-width: 767px) {

        .div-translate {
            margin-top: 1rem;
            margin-right: 1rem;
            align-items: right;
            text-align: right;
            display: block;
        }
    }
</style>

<div class="mainnav">

    <div class="navbar-header">
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary btn-lg">Search</button>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <!-- <span class="search-button visible-xs"><a href="#search"><i class="fa fa-search"></i></a></span> -->

        <!-- offcanvas-trigger -->
        <button type="button" class="navbar-toggle div-toggle-navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="div-translate">
            <select class="selectlang" onchange="changeLanguage(this)">
                <option <?php if ($_SESSION['lang'] == "id") {
                            echo "selected";
                        } ?> value="id">Indonesia</option>
                <option <?php if ($_SESSION['lang'] == "en") {
                            echo "selected";
                        } ?> value="en">English</option>
            </select>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-collapse">
            <ul class="nav navbar-nav hidden-sm">
                <li><a href="index.php" <?php if (!(isset($_GET['menu']))) { ?> style="background:#290101; color:white" ;<?php } ?>><?php echo get_selected_language("Beranda", "Home"); ?></a></li>
                <li><a href="?menu=about" <?php if ((isset($_GET['menu']) and ($_GET['menu'] == "about"))) { ?> style="background:#290101; color:white" ;<?php } ?>><?php echo get_selected_language("Tentang Kami", "About Us"); ?></a></li>
                <li><a href="?menu=services" <?php if ((isset($_GET['menu']) and ($_GET['menu'] == "services" or $_GET['menu'] == "services-detail"))) { ?> style="background:#290101; color:white" ;<?php } ?>><?php echo get_selected_language("Layanan", "Services"); ?></a></li>
                <li><a href="?menu=gallery" <?php if ((isset($_GET['menu']) and ($_GET['menu'] == "gallery"))) { ?> style="background:#290101; color:white" ;<?php } ?>><?php echo get_selected_language("Galeri", "Gallery"); ?></a></li>
                <li><a href="?menu=contact" <?php if ((isset($_GET['menu']) and ($_GET['menu'] == "contact"))) { ?> style="background:#290101; color:white" ;<?php } ?>><?php echo get_selected_language("Kontak", "Contact"); ?></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>