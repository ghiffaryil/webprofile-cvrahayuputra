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
                <li><a href="index.php">Beranda</a></li>
                <li><a href="?menu=about">Tentang Kami</a></li>
                <li><a href="?menu=services">Layanan</a></li>
                <li><a href="?menu=gallery">Galeri</a></li>
                <!-- <li><a href="?menu=blog">Artikel</a></li> -->
                <li><a href="?menu=contact">Kontak</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>