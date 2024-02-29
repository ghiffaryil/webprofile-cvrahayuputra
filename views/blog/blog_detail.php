<?php
if (isset($_GET["blog_id"])) {
	$Get_Id_Primary = $a_hash->decode($_GET['blog_id'], $_GET['menu']);
	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_blog_artikel", "Id_Blog_Artikel", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		$edit = $result['Hasil'];
	} else {
		// echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='index.php?menu=services'</script>";
	}
}
?>

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
			<div class="posts-container single-post">
				<div class="col-md-9 col-sm-8">
					<article class="blog-post-wrapper">
						<div class="figure">
							<div class="post-thumbnail">
								<img src="dashboard/media/artikel/<?php echo $edit['Foto_Artikel'] ?>" class="img-responsive " alt="">
							</div>

						</div>
						<div class="entry-content">
							<header class="entry-header clearfix">
								<div class="entry-meta">
									<ul class="list-inline">
										<li>
											<div class="posted-date pull-left">
												<?php echo tanggal_dan_waktu_24_jam_indonesia($edit['Waktu_Simpan_Data']) ?>
											</div>
										</li>
									</ul>
								</div><!-- .entry-meta -->
								<h2 class="entry-title"><?php echo $edit['Judul_Artikel'] ?></h2>
							</header><!-- .entry-header -->
							<p>
								<?php echo $edit['Isi_Artikel'] ?>
							</p>
							<br>
						</div><!-- .entry-content -->
					</article>

				</div>
			</div> <!-- /.col -->


			<div class="col-md-3 col-sm-4">
				<div class="sidebar-wrapper">
					<aside class="widget widget_categories">
						<h3>Artikel Lainnya</h3>
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
									<li><a href="?menu=blog-detail&blog_id=<?php echo $a_hash->encode($data['Id_Blog_Artikel'], 'blog'); ?>"><?php echo $data['Judul_Artikel'] ?></a></li>
							<?php
								}
							}
							?>
						</ul>
					</aside>

					<aside style="display:none">
						<h3>Bagikan Konten</h3>
						<div class="social-share">
							<ul class="list-inline social-links">
								<li><a href="#" target="_blank" class="share-facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank" class="share-twitter"><i class="fa fa-twitter"></i></a></li>
								<!-- <li><a href="#" target="_blank" class="share-dribbble"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#" target="_blank" class="share-google-plus"><i class="fa fa-google-plus"></i></a></li> -->
							</ul>
						</div>
					</aside>

				</div>
			</div>

		</div>
	</div> <!-- /.posts-container -->
</section><!-- /blog-section -->


<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Get the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const blogId = urlParams.get('blog_id');

        // Construct the URL without blog_id
        const baseUrl = 'http://localhost/cvrahayuputra/index.php?menu=blog-detail';
        const fullUrl = encodeURIComponent(baseUrl + '&blog_id=' + blogId);

        // Share to Facebook
        const facebookShareBtn = document.querySelector('.share-facebook');
        facebookShareBtn.href = 'https://www.facebook.com/sharer/sharer.php?u=' + fullUrl;

		// Share to Twitter
		const twitterShareBtn = document.querySelector('.share-twitter');
		twitterShareBtn.href = 'https://twitter.com/intent/tweet?url=http://localhost/cvrahayuputra/index.php?menu=blog-detail&blog_id=' + blogId;

		// Share to Dribbble
		const dribbbleShareBtn = document.querySelector('.share-dribbble');
		dribbbleShareBtn.href = 'https://dribbble.com/share?url=http://localhost/cvrahayuputra/index.php?menu=blog-detail&blog_id=' + blogId;

		// Share to Google Plus
		const googlePlusShareBtn = document.querySelector('.share-google-plus');
		googlePlusShareBtn.href = 'https://plus.google.com/share?url=http://localhost/cvrahayuputra/index.php?menu=blog-detail&blog_id=' + blogId;
	});
</script>