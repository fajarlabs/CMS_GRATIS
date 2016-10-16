<div class="primary">
	<div class="container">
		<?php 
		$judul = mysql_real_escape_string($_GET['judul_seo']);
		$q = mysql_query("SELECT * FROM halamanstatis WHERE judul_seo = '$judul'");
		$o = mysql_fetch_object($q);
		echo $o->isi_halaman;
		?>
	</div>
</div>		