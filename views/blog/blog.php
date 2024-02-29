<section class="page-title-section" style="position: relative; background-image: url(assets/img/slider/construction-site-silhouettes.jpg); background-repeat: no-repeat; background-position:bottom-center; background-size:cover">
	<div class="black-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
	<div class="container" style="position: relative; z-index: 2;">
		<div class="page-header">
			<h1>Artikel</h1>
		</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Artikel</li>
		</ol>
	</div>
</section><!--/.page-title-section -->

<!-- blog-section -->
<section class="blog-section">
	<!-- container -->
	<div class="container" style="padding: 50px 0">
		<!-- row -->
		<div class="row">
			<!-- posts-container -->
			<div class="">
				<div class="col-md-10">
					<div class="row row-flex row-flex-wrap">

						<?php

						$search_field_where = array("Status");
						$search_criteria_where = array("=");
						$search_value_where = array("Aktif");
						$search_connector_where = array("");

						$nomor = 0;

						$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_blog_artikel", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

						if ($result['Status'] == "Sukses") {
							$data_hasil = $result['Hasil'];
							foreach ($data_hasil as $data) {
						?>
								<div class="col-md-6 col-sm-12">
									<article class="blog-post-wrapper">
										<div class="figure">
											<div class="post-thumbnail">
												<img src="dashboard/media/artikel/<?php echo $data['Foto_Artikel'] ?>" style="height:400px">
											</div>
										</div>
										<div class="entry-content">
											<header class="entry-header clearfix">
												<div class="entry-meta">
													<ul class="list-inline">
														<li>
															<div class="posted-date pull-left">
																<?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']) ?>
															</div>
														</li>
													</ul>
												</div><!-- .entry-meta -->
												<h3 class="entry-title"><a href="blog-single.html" class="text-muted"><?php echo $data['Judul_Artikel'] ?></a></h3>


											</header><!-- .entry-header -->

											<p><?php echo substr($data['Isi_Artikel'], 0, 100) ?>...</p>
											<footer class="entry-footer"> <br>
												<a href="?menu=blog-detail&blog_id=<?php echo $a_hash->encode($data['Id_Blog_Artikel'], $_GET['menu']); ?>" class="btn btn-primary btn-sm">Lihat Detail<i class="fa fa-long-arrow-right"></i></a>
											</footer>
										</div><!-- .entry-content -->

									</article><!-- /.blog-post-wrapper -->

								</div>
						<?php
							}
						}
						?>
					</div><!-- /.row -->
				</div> <!-- /col-md-8 -->


				<div class="col-md-2">
					<div class="sidebar-wrapper">
						<aside class="widget widget_categories">
							<h2 class="widget-title">Artikel Lainnya</h2>
							<ul class="widget-arrow-list">
								<?php
								$search_field_where = array("Status");
								$search_criteria_where = array("=");
								$search_value_where = array("Aktif");
								$search_connector_where = array("");

								$nomor = 0;

								$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_blog_artikel", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

								if ($result['Status'] == "Sukses") {
									$data_hasil = $result['Hasil'];

									foreach ($data_hasil as $data) {
								?>
										<li><a href="?menu=blog-detail&blog_id=<?php echo $a_hash->encode($data['Id_Blog_Artikel'], $_GET['menu']); ?>"><?php echo $data['Judul_Artikel'] ?></a></li>
								<?php
									}
								}
								?>
							</ul>
						</aside>

					</div>

				</div>
			</div> <!-- /posts-container -->
		</div><!-- /row -->
	</div><!-- /container -->
</section><!-- /blog-section -->