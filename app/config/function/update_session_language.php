<?php
session_start();

if(isset($_POST['lang']) && ($_POST['lang'] == 'id' || $_POST['lang'] == 'en')) {
    
    $_SESSION['lang'] = $_POST['lang'];
    // echo "<script>alert('Session updated to $_POST[lang]')</script>";
} else {
    // Default language
    $_SESSION['lang'] = 'id'; // Change 'id' to your preferred default language
    // echo "<script>alert('Session updated to default language (id)')</script>";
}
?>
