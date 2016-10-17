<div class="primary">
	<div class="container">
		<?php 
		function parsingCodeHTML($str = "") {
			$newString = $str;
			$q = mysql_query("SELECT * FROM kode_html");
			while($o = mysql_fetch_object($q)) {
		    	$newString = preg_replace('/<codehtml .*?data="(.*?'.$o->kode.'.*?)">(.*?)<\/codehtml>/',$o->html,$newString);
			}

			return $newString;
		}

		$judul = mysql_real_escape_string($_GET['judul_seo']);
		$q = mysql_query("SELECT * FROM halamanstatis WHERE judul_seo = '$judul'");
		$o = mysql_fetch_object($q);
		echo parsingCodeHTML($o->isi_halaman);
		?>
	</div>
</div>		