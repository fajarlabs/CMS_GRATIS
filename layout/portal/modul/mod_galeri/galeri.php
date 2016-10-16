<div class="gallery">		
		<div class="container">
			<h2 class="tittle-one font-satisfy">Galeri Kami</h2>
			<div>	
				<?php 
				$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 0;
				$batas  = 12;
				$q = mysql_query("SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT $halaman, $batas");
				while($arr = mysql_fetch_object($q)) {			
				echo '<div class="col-md-4 view">
					<a class="fancybox" data-fancybox-group="gallery" title="'.$arr->jdl_gallery.'" href="/img_galeri/'.$arr->gbr_gallery.'">
						<img style="width:360px;height:245px;" src="/img_galeri/'.$arr->gbr_gallery.'" class="img-responsive" alt="">
					</a>
				</div>';
				} ?>
				<div class="clearfix"> </div>
				<center>
				<?php 
				    $p      = new PagingGallery;
    				$posisi = $p->cariPosisi($batas);
    				$jmldata = mysql_num_rows(mysql_query("SELECT * FROM gallery"));
    				$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    				echo $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    			?>
				</center>
			</div>				
		</div>
	</div>