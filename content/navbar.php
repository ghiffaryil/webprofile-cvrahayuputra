<style>

.div-toggle-navigation {
            display: none;
        }

    @media only screen and (max-width: 920px) {
        .div-toggle-navigation {
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-collapse">

            <!-- <span class="search-button pull-right"><a href="#search"><i class="fa fa-search"></i></a></span> -->

            <ul class="nav navbar-nav hidden-sm">
                <li><a href="index.php"> <?php if($selected_language=="id"){ echo "Beranda";}else{ echo "Home";}?></a></li>
                <li><a href="?menu=about"> <?php if($selected_language=="id"){ echo "Tentang Kami";}else{ echo "About Us";}?></a></li>
                <li><a href="?menu=services"> <?php if($selected_language=="id"){ echo "Layanan";}else{ echo "Services";}?></a></li>
                <li><a href="?menu=gallery"> <?php if($selected_language=="id"){ echo "Galeri";}else{ echo "Gallery";}?></a></li>
                <li><a href="?menu=contact"> <?php if($selected_language=="id"){ echo "Kontak";}else{ echo "Contact";}?></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>