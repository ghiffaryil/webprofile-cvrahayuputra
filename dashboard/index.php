<?php 
if(!((isset($_COOKIE['Cookie_1_CVRahayuPutra'])) OR (isset($_COOKIE['Cookie_2_CVRahayuPutra'])) OR (isset($_COOKIE['Cookie_3_CVRahayuPutra'])) )){
	echo "<script>document.location.href='login.php';</script>";
}else{
	echo "<script>document.location.href='dashboard.php';</script>";
}
 ?>