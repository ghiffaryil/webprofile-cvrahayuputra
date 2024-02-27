<section class="sidebar position-relative">	
	<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<?php 
			if(($cek_login_Login_Sebagai == "Admin")){
				include "master/modul/dashboard_admin/template/sidebar2.php"; 
			}

			if(($cek_login_Login_Sebagai == "Marketing")){
				include "master/modul/dashboard_marketing/template/sidebar.php"; 
			}

			if(($cek_login_Login_Sebagai == "Tentor")){
				include "master/modul/dashboard_tentor/template/sidebar.php"; 
			}

			if(($cek_login_Login_Sebagai == "Siswa")){
				include "master/modul/dashboard_siswa/template/sidebar.php"; 
			}

			if(($cek_login_Login_Sebagai == "Wali_Kelas")){
				include "master/modul/dashboard_wali_kelas/template/sidebar.php"; 
			}

			if(($cek_login_Login_Sebagai == "Developer")){
				include "master/modul/dashboard_developer/template/sidebar.php"; 
			}
			?>
		</div>
	</div>
</section>
	<!-- <div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div> -->