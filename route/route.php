<?php
if (isset($_GET['menu'])) {
    switch ($_GET['menu']) {

        case 'homepage':
            include "views/homepage/homepage.php";
            break;
        case 'about':
            include "views/about/about.php";
            break;
        case 'contact':
            include "views/contact/contact.php";
            break;
        case 'gallery':
            include "views/gallery/gallery.php";
            break;
        case 'services':
            include "views/services/services.php";
            break;
        case 'blog':
            include "views/blog/blog.php";
            break;

        default:
            break;
    }
} else {

    include "views/homepage/homepage.php";
}
