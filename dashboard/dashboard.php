<?php
session_start();
include "config/master.php";

//FUNGSI CEK LOGIN
if (!((isset($_COOKIE['Cookie_1_CVRahayuPutra'])) and (isset($_COOKIE['Cookie_2_CVRahayuPutra'])) and (isset($_COOKIE['Cookie_3_CVRahayuPutra'])))) {
    echo "<script>alert('Silahkan Login Kembali !!!');document.location.href='login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';</script>";
    exit();
} else {
    //UNTUK CEK COOKIE LOGIN APAKAH BENAR DATA TERSEBUT ADA PADA DATABASE
    $cek_login_Id_User = $a_hash->decode($_COOKIE['Cookie_1_CVRahayuPutra'], "Id_User");
    $cek_login_Password = $a_hash->decode($_COOKIE['Cookie_2_CVRahayuPutra'], "Password");
    $cek_login_Login_Sebagai = $a_hash->decode($_COOKIE['Cookie_3_CVRahayuPutra'], "Login_Sebagai");

    $search_field_where = array("Status", "Id_Admin", "Password");
    $search_criteria_where = array("=", "=", "=");
    $search_value_where = array("Aktif", "$cek_login_Id_User", "$cek_login_Password");
    $search_connector_where = array("AND", "AND", "");
    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_admin", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

    if ($result['Status'] == "Sukses") {
        $u_array_data_user = $result['Hasil'];
        $u_Login_Sebagai = $cek_login_Login_Sebagai;
        $u_Id_User = $u_array_data_user[0]['Id_Admin'];
        $u_Sebagai = $u_array_data_user[0]['Sebagai'];
        $u_Id_Role = $u_array_data_user[0]['Id_Role'];
        $u_Nama_Lengkap = $u_array_data_user[0]['Nama_Lengkap'];
    } else {
        echo "<script>alert('Silahkan Login Kembali !!!');document.location.href='login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "template/head.php" ?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <?php include "template/header.php" ?>
        <?php include "template/sidebar.php" ?>
        <?php include "controllers/controller_page_admin.php" ?>
        <?php include "template/footer.php" ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php include "template/footer_script.html" ?>
</body>
</html>