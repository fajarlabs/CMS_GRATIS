<!--banner-->
	<div class="banner" style="z-index: -1000">
		<div class="banner-title animated wow zoomIn" data-wow-delay=".5s"> 
			<div class="container">
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<?php 
						$q = mysql_query("SELECT * FROM slider_gambar");
						while($arr = mysql_fetch_array($q)) {
						?>
						<li>
							<div class="banner-text"> 
								<h2 class="font-satisfy"><?php echo $arr['judul']; ?></h2>
								<?php echo $arr['keterangan']; ?>
							</div>
						</li>
						<?php } ?>
					</ul>	
				</div>			
			</div>
		</div>	
	</div>	
<!--//banner-->
<!--welcome-->
	<div class="welcome">
		<div class="container">
			<?php echo getHtml('kode-13'); ?>
			<?php echo getHtml('kode-14'); ?>
			<div class="clearfix"></div>
		</div>
	</div>
<!--//welcome-->
<!--primary-->
	<div class="primary">
		<div class="container">
			<div class="col-md-4 primary-left animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="primar-tp">
					<?php echo getHtml('kode-1'); ?>
				</div>
			</div>
			<?php 
			$q = mysql_query("SELECT * FROM berita WHERE headline = 'Y' LIMIT 2"); 
			while($arr = mysql_fetch_array($q)) {
				echo '
					<div class="col-md-4 primary-left animated wow fadeInUp animated" data-wow-delay=".5s">
					<div class="history-grid-image">
						<img style="height:225px;" src="foto_berita/'.$arr['gambar'].'" class="img-responsive zoom-img" alt="">
					</div>
						<h4><i class="icon-caret-right"></i> <a href="/artikel-'.$arr['judul_seo'].'.html">'.$arr['judul'].'</a></h4>
					</div>';
			} ?>

			<div class="clearfix"></div>
		</div>
	</div>
<!--//primary-->
<!--news-->
<div class="news" style="background: url(<?php echo $f['folder']; ?>/images/banner-1.jpg) no-repeat fixed;">
	<div class="container">
		<div class="news-main">
		
			 	<h4 class="font-satisfy">Artikel Pilihan</h4>
			 	 <?php $q = mysql_query("SELECT * FROM berita WHERE utama = 'Y' LIMIT 3"); 
			 	 while($arr = mysql_fetch_array($q)) {
			 	 	echo '
					 	 <div class="col-md-4 news-grid animated wow fadeInLeft" data-wow-delay=".5s">
					 	 	 <img style="height:225px;" src="foto_berita/'.$arr['gambar'].'" class="img-responsive zoom-img shadow" alt="">
					 	 	 <label style="padding-top:10px;padding-bottom:10px;font-size:1.3em;color:#f1f1f1;"><i class="icon-angle-right"></i> '.$arr['judul'].'</label>
					 	 	 <br />
					 	 	 <a href="/artikel-'.$arr['judul_seo'].'.html" ><i class="icon-caret-right"></i> Baca Selengkapnya</a>
			 	 		</div>';
			 	 	} ?>

			  <div class="clearfix"> </div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--news-->
<!--popular-->
	<div class="popular">
		<div class="container">
			<h3 class="font-satisfy">Video Populer</h3>
			<div class="col-md-5 popular-left animated wow fadeInLeft" data-wow-delay=".5s">
				<?php echo getHtml('kode-15'); ?>
			</div>
			<div class="col-md-7 popular-right animated wow fadeInRight" data-wow-delay=".5s">
			 	 <?php $q = mysql_query("SELECT * FROM berita WHERE aktif = 'Y' LIMIT 2"); 
			 	 while($arr = mysql_fetch_array($q)) {
			 	 	echo '
						<div class="popular-grids">
							<div class="col-md-4 popular-text">
								<img src="foto_berita/'.$arr['gambar'].'" class="img-responsive" alt="">
							</div>
							<div class="col-md-8 popular-text pplr-right cl-effect-1">
								<h4>'.$arr['judul'].'</h4>
								<p> '.readMore($arr['isi_berita'],21,"<a class=\"more\" href=\"artikel-".$arr['judul_seo'].".html\">Baca selengkapnya</a>").'</p>
								
							</div>
							<div class="clearfix"> </div>
						</div>';
			 	 	} ?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--popular-->