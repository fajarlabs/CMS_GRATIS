<div class="gallery">		
	<div class="container">
		<h2 class="tittle-one font-satisfy">Informasi Terkini</h2><br />

		<?php 
		$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 0;
		$batas  = 10;
		$q = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $halaman, $batas");
		while($arr = mysql_fetch_object($q)) {
		echo '<div class="col-md-12">
			<h4>'.$arr->judul.'</h4>
			<div style="height:5px;"></div>
			<table>
			<tr>
				<td style="padding-right:10px;padding-bottom:10px;">
					<img width="150px;" height="100px" class="thumbnail" src="/foto_berita/'.$arr->gambar.'" />
				</td>
				<td valign="top">
					'.readMore(strip_tags($arr->isi_berita), 65, "... <a href='/artikel-".$arr->judul_seo.".html'>Selengkapnya</a>").'
				</td>
			</tr>
			</table>
		</div>';
		} 

		$p      = new PagingGlobal;
    	$posisi = $p->cariPosisi($batas);
    	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
    	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman,'semua-artikel'); 
    	echo "<center>$linkHalaman</center>";
    	?>
		


	</div>
</div>