<?php 
//PEMANGGILAN FILE HALAMAN / PAGE
if(isset($_GET['menu'])){
switch ($_GET['menu']) {

	case 'home':
		include "views/home/home.php";
		break;
	
    case 'data_admin':
		include "views/data_admin/data_admin.php";
		break;

	case 'setting_website':
		include "views/setting_website/setting_website.php";
		break;

	case 'role':
		include "views/role/data_role.php";
		break;

	case 'banner':
		include "views/banner/banner.php";
		break;

	case 'testimoni':
		include "views/testimoni/testimoni.php";
		break;	

	case 'tentang_kami':
		include "views/tentang_kami/tentang_kami.php";
		break;	

	case 'faq':
		include "views/faq/faq.php";
		break;

	case 'artikel':
		include "views/artikel/artikel.php";
		break;
	
	case 'galeri':
		include "views/galeri/galeri.php";
		break;

	default:
		# code...
		break;
}
}else{
	include "views/home/home.php";
}

?>