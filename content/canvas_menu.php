<div class="offcanvas-menu offcanvas-effect">
    <div class="offcanvas-wrap">
        <div class="off-canvas-header">
            <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas" id="off-canvas-close-btn">&times;</button>
        </div>
        <ul id="offcanvasMenu" class="list-unstyled visible-xs visible-sm">
            <li><a style="font-size:20px" href="index.php"><?php echo get_selected_language("Beranda", "Home"); ?></a></li>
            <li><a style="font-size:20px" href="?menu=about"><?php echo get_selected_language("Tentang Kami", "About Us"); ?></a></li>
            <li><a style="font-size:20px" href="?menu=services"><?php echo get_selected_language("Layanan", "Services"); ?></a></li>
            <li><a style="font-size:20px" href="?menu=gallery"><?php echo get_selected_language("Galeri", "Gallery"); ?></a></li>
            <li><a style="font-size:20px" href="?menu=contact"><?php echo get_selected_language("Kontak", "Contact Us"); ?></a></li>
        </ul>
    </div>
</div>