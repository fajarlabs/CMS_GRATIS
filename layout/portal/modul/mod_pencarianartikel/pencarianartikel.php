<!--//banner-->
<div class="about"> 
	<div class="container">
		<h2 class="tittle-one font-satisfy">Pencarian Artikel </h2><br />
		<h3>Hasil pencarian dengan kata kunci "<?php echo $_POST['judul']; ?>"</h3>
		<br />
		<?php 
		$judul = mysql_real_escape_string($_POST['judul']);
		if(!empty($judul)) {
			$q = mysql_query("SELECT * FROM berita WHERE judul LIKE '%".$judul."%' LIMIT 10");
			$total = mysql_numrows($q);
			$html = "";
			if($total > 0) {
				$html = "<ul>";
				while($o = mysql_fetch_object($q)) {
					$html.="<li><a href='/artikel-".$o->judul_seo.".html'>".$o->judul."</li>";
				} 
				$html .= "</ul>";
			} else {
				$html .= "<h4>Tidak menemukan data, coba dengan kata kunci lainnya!</h4>";
			}

			echo $html;
		} else {
			echo "<h4>Tidak menemukan data, coba dengan kata kunci lainnya!</h4></li>";
		}
		?>
	</div>
</div>