<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

include "template/head.php";
include "app/config/function/master.php";

$result = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_website", "Id_Pengaturan_Website", "1");
$data_setting_website = $result['Hasil'];

$result = $a_tambah_baca_update_hapus->baca_data_id("tb_tentang_kami", "Id_Tentang_Kami", "1");
$data_tentang_kami = $result['Hasil'];

include "app/config/function/get_selected_language.php";

?>

<body id="page-top">
	<div id="st-container" class="st-container">
		<div class="st-pusher">
			<div class="st-content">
				
				<?php include "content/header.php"; ?>

				<!-- PAGE CONTENT -->
				<?php include "route/route.php" ?>

				<?php include "content/footer.php" ?>
				<!-- copyright-section end -->
			</div> <!-- .st-content -->
		</div> <!-- .st-pusher -->

		<!-- OFFCANVAS MENU -->
		<?php include "content/canvas_menu.php"; ?>
		<!-- .offcanvas-menu -->
	</div><!-- /st-container -->

	<?php include "template/footer_script.php" ?>

</body>

</html>