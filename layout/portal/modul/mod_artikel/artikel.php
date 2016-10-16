<div class="gallery">		
	<div class="container">
		<h2 class="tittle-one font-satisfy">Detail Artikel</h2>
		<br />
		<?php 
		$judulseo = mysql_real_escape_string($_GET['judul_seo']); 
		$q = mysql_query("SELECT * FROM berita LEFT JOIN kategori ON kategori.id_kategori = berita.id_kategori WHERE judul_seo = '$judulseo'");
		while($o = mysql_fetch_object($q)) {
			$gambar = "";
			if(!empty($o->gambar)) {
				$gambar = '<image style="float:left;margin-right:10px;margin-bottom:10px;" class="thumbnail" src="/foto_berita/'.$o->gambar.'" />';
			}
		echo '
		<div>
			<table>
				<tr>
					<td><h4>Judul</h4></td>
					<td> &nbsp;:&nbsp; </td>
					<td><h4>'.$o->judul.'</h4></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td> &nbsp;:&nbsp; </td>
					<td>'.$o->nama_kategori.'</td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td> &nbsp;:&nbsp; </td>
					<td>'.tgl_indo($o->tanggal).'</td>
				</tr>
			</table>
			<div style="float:right;"><br />
				'.$gambar.'
				'.$o->isi_berita.'
			</div>
		</div>';
		}
		?>
	</div>
</div>