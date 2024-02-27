<header class="main-header" style="background-color: #deeaf9;">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="dashboard.php" class="logo">
			<!-- logo-->
			<div class="logo-lg">
				<span class="light-logo">CV Rahayu Putra</span>
				<!-- <span class="dark-logo"><img src="images/logo-light-text.png" alt="logo"></span> -->
			</div>
		</a>	
	</div>  

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top">
		
		<!-- Sidebar toggle button-->
		<div class="navbar-custom-menu l-side">
			<ul class="nav navbar-nav">	
				<!-- User Account-->
				<?php if($cek_login_Login_Sebagai=="Admin"){ ?>
					<li class="user user-menu">
						<a href="?menu=dashboard_admin_try_out_master" class="waves-effect waves-light dropdown-toggle" title="User">
							<i class="fa fa-pencil"><span class="path1"></span><span class="path2"></span></i>
						</a>
					</li>

					<li class="user user-menu">
						<a href="?menu=dashboard_admin_produk_diamond" class="waves-effect waves-light dropdown-toggle" title="User">
							<i class="fa fa-diamond"><span class="path1"></span><span class="path2"></span></i>
						</a>
					</li>

					<li class="user user-menu">
						<a href="?menu=dashboard_admin_bank_soal" class="waves-effect waves-light dropdown-toggle" title="User">
							<i class="fa fa-book"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		
		<div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">	
				<li class="btn-group nav-item d-lg-inline-flex d-none">
					<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
						<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
				<li class="btn-group d-lg-inline-flex d-none">
					<div class="app-menu d-none">
						<div class="search-bx mx-5">
							<form>
								<div class="input-group">
									<input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
									<div class="input-group-append">
										<button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</li>
				
				<!-- User Account-->
				<li class="dropdown user user-menu">
					<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
						<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					</a>
					<ul class="dropdown-menu animated flipInX">
						<li class="user-body">
							<a class="dropdown-item" href="logout.php"><i class="ti-lock text-muted me-2"></i> Logout</a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
</header>