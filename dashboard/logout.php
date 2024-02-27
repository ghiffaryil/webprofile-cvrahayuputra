<?php
session_start();
session_destroy();

unset($_COOKIE["Cookie_1_CVRahayuPutra"]);
unset($_COOKIE["Cookie_2_CVRahayuPutra"]);
unset($_COOKIE["Cookie_3_CVRahayuPutra"]);

echo "<script>alert('Logout Berhasil');document.location.href='login.php';</script>";
?>