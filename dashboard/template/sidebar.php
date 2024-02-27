<aside class="main-sidebar">
	<section class="sidebar position-relative">
		<div class="multinav">
			<div class="multinav-scroll" style="height: 100%;">
				<?php

				$permission_modul_sidebar_Admin_Panel = $a_role_permission->read_permission($u_Id_Role, "Admin_Panel");
				$check_permission_sidebar_Admin_Panel = $permission_modul_sidebar_Admin_Panel[1];

				$permission_modul_sidebar_Data_Banner = $a_role_permission->read_permission($u_Id_Role, "Data_Banner");
				$check_permission_sidebar_Data_Banner = $permission_modul_sidebar_Data_Banner[1];

				$permission_modul_sidebar_Tentang_Kami = $a_role_permission->read_permission($u_Id_Role, "Tentang_Kami");
				$check_permission_sidebar_Tentang_Kami = $permission_modul_sidebar_Tentang_Kami[1];

				$permission_modul_sidebar_FAQ = $a_role_permission->read_permission($u_Id_Role, "FAQ");
				$check_permission_sidebar_FAQ = $permission_modul_sidebar_FAQ[1];

				$permission_modul_sidebar_Testimoni = $a_role_permission->read_permission($u_Id_Role, "Testimoni");
				$check_permission_sidebar_Testimoni = $permission_modul_sidebar_Testimoni[1];

				$permission_modul_sidebar_Data_Artikel = $a_role_permission->read_permission($u_Id_Role, "Data_Artikel");
				$check_permission_sidebar_Data_Artikel = $permission_modul_sidebar_Data_Artikel[1];
				?>

				<!-- sidebar menu-->
				<ul class="sidebar-menu" data-widget="tree">
					<li>
						<a href="dashboard.php">
							<i class="mdi mdi-speedometer"><span class="path1"></span><span class="path2"></span></i>
							<span>Dashboard</span>
						</a>
					</li>

					<li class="header">Admin Panel</li>
					<li class="treeview">
						<a href="#">
							<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
							<span>Admin</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=data_admin&tambah"><i class="mdi mdi-account-plus"><span class="path1"></span><span class="path2"></span></i>Tambah Admin</a></li>
							<li><a href="?menu=data_admin"><i class="mdi mdi-playlist-check"><span class="path1"></span><span class="path2"></span></i>List Admin</a></li>
							<li><a href="?menu=pengaturan_role"><i class="mdi mdi-shield"><span class="path1"></span><span class="path2"></span></i>Role Admin</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
							<span>Pengaturan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=setting_website"><i class="mdi mdi-pencil-box"><span class="path1"></span><span class="path2"></span></i>Pengaturan Website</a></li>
						</ul>
					</li>

					<li class="header">Data Informasi</li>
					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-account-card-details"><span class="path1"></span><span class="path2"></span></i>
							<span>Tentang Kami</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=tentang_kami"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tentang Kami</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-comment-question-outline"><span class="path1"></span><span class="path2"></span></i>
							<span>FAQ</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=faq"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Faq</a></li>
						</ul>
					</li>

					<li class="header">Data Tambahan</li>
					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-camera-burst"><span class="path1"></span><span class="path2"></span></i>
							<span>Slideshow</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=banner"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Banner</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-image"><span class="path1"></span><span class="path2"></span></i>
							<span>Galeri</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=galeri"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Galeri</a></li>
						</ul>
					</li>
					
					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-newspaper"><span class="path1"></span><span class="path2"></span></i>
							<span>Artikel</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=artikel"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Artikel</a></li>
						</ul>
					</li>

					<li class="header">Feedback User</li>
					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-star"><span class="path1"></span><span class="path2"></span></i>
							<span>Testimoni</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=testimoni"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Testimoni</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-phone"><span class="path1"></span><span class="path2"></span></i>
							<span>Kontak</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="?menu=kontak"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Kontak</a></li>
						</ul>
					</li>

					<li class="header">Logout</li>
					<li class="treeview">
						<a href="#">
							<i class="mdi mdi-power"><span class="path1"></span><span class="path2"></span></i>
							<span>Logout</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="logout.php" class="text-danger"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Logout</a></li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
	</section>
</aside>