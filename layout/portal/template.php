<?php  
include "../../../system/load.php";

function getSlideAll() {
	$q = mysql_query("SELECT gambar FROM slider_gambar");
	$count = mysql_numrows($q);
	$str = "";
	while($o = mysql_fetch_object($q)) {
		$comma = "";
		if($count > 1) {
			$comma = ",";
		}
		$count--;
		$str .= '"'.$o->gambar.'"'.$comma;
	}
	return $str;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>.:: Portal Galeri Terpercaya ::..</title>
<link href="<?php echo $f['folder']; ?>/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php echo $f['folder']; ?>/css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="<?php echo $f['folder']; ?>/css/lightbox.css">
<link rel="stylesheet" href="<?php echo $f['folder']; ?>/plugins/font-awesome/css/font-awesome.css">

<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto+Condensed|Satisfy" rel="stylesheet"> 

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
	function hideURLbar() { window.scrollTo(0,1); } 
</script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="<?php echo $f['folder']; ?>/js/jquery-1.11.1.min.js"></script> 
<script src="<?php echo $f['folder']; ?>/js/bootstrap.js"></script>
<!-- //js -->
<!-- banner-text Slider starts Here -->
<script src="<?php echo $f['folder']; ?>/js/responsiveslides.min.js"></script>
<script>
	var arrSlide = [<?php echo getSlideAll(); ?>];
// You can also use "$(window).load(function() {"
	$(function () {
	// Slideshow 3
		var i = -1;
		$("#slider3").responsiveSlides({
		auto: true,
		pager:true,
		nav:true,
		speed: 500,
		namespace: "callbacks",
		before: function () {
			i++;
			/*console.log(i);*/
		},
		after: function () {
			/*console.log(arrSlide[i]);*/
			$('.banner').css("background-image","url('http://localhost/img_slider/"+arrSlide[i]+"')");
			if(i == (arrSlide.length-1)) i = -1; 
		}
	});	
});
</script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo $f['folder']; ?>/plugins/fancy/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $f['folder']; ?>/plugins/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
<!--//End-slider-script -->
<!-- animation-effect -->
<link href="<?php echo $f['folder']; ?>/css/animate.min.css" rel="stylesheet"> 
<script src="<?php echo $f['folder']; ?>/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
<body>
<!--header-->
	<div class="header">
	</div>
<!--//header-->
<!--navigation-->
		<div class="top-nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a style="margin-top:-20px;" class="navbar-brand animated wow fadeInLeft" data-wow-delay=".5s" href="index.html">
							<?php 
							$q = mysql_query("SELECT gambar FROM logo LIMIT 1 ");
							if(mysql_numrows($q) > 0) {
								while($o = mysql_fetch_object($q)) {
									echo '<image height="80px" src="'.$f['folder'].'/images/'.$o->gambar.'" />';
								}
							} ?>
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

						<ul class="nav navbar-nav navbar-left animated wow fadeInRight" data-wow-delay=".5s">
						<?php
						
						function get_menu($data, $parent = 0, $parent_class_li = "dropdown", $sub_class_ul = "dropdown-menu", $anchor_properties= 'class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"') {
						  	if (isset($data[$parent])) {
							  	$html = ""; /* buka awal list */
							  	foreach ($data[$parent] as $v) {
								  	$child = get_menu($data, $v->id_menu);

								  	$temp_submenu = "";
								  	if ($child) $temp_submenu = "<ul class=\"{$sub_class_ul}\">$child</ul>"; 

								  	$aktif_pertama = $v->aktif_pertama == 1 ? "active" : "";
								  	if(empty($temp_submenu)) 
								  		$html .= '<li class="'.$aktif_pertama.'"><a href="'.$v->link.'">'.$v->nama_menu.'</a></li>'; /* jika tidak ada submenu */
								  	else {
								  		/* jika ada submenu maka tambahkan css */
								  		$html .= '<li class="'.$parent_class_li.' '.$aktif_pertama.'"><a '.$anchor_properties.' href="'.$v->link.'">'.$v->nama_menu.'</a>'.$temp_submenu.'</li>';
								  	}
							  	}
							  	return $html;
						  	} else 
						  		return false;
						}
						  
						$result = mysql_query("SELECT * FROM menu WHERE aktif='Ya' ORDER BY id_menu");
						while ($row = mysql_fetch_object($result)) {
							$data[$row->id_parent][] = $row;
						}

						$menu = get_menu($data);
						echo "$menu";
						?>
						</ul>

						<form class="navbar-form navbar-right" action="/cari-artikel.html" method="post">
							<div class="form-group">
								<input type="text" name="judul" class="form-control" placeholder="Cari Artikel">
								<button type="submit" class="btn btn-default" aria-label="Left Align">
									<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</div>
						</form>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>	
			</div>			
		</div>	
<!--navigation-->

<!-- content -->
<?php include "isi.php"; ?>
<!-- end-content -->

<!--footer-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
		    <div class="col-md-3 ftr-grid animated wow fadeInLeft" data-wow-delay=".5s">
		    	<?php echo getHtml('kode-18'); ?>
		    </div>
		    <div class="col-md-3 ftr-grid animated wow fadeInDown animated" data-wow-delay=".5s">
		    	<h3>Kategori Halaman</h3>
		    	<ul>
		    		<?php 
		    		$q = mysql_query("SELECT * FROM kategori LIMIT 5"); 
		    		while($arr = mysql_fetch_array($q)) {
		    		echo '<li><a href="#">'.$arr['nama_kategori'].'</a></li>';
		    		} ?>
		    		
		    	</ul>
		    </div>
		    <div class="col-md-3 ftr-grid animated wow fadeInUp animated" data-wow-delay=".5s">
					<h3>Galeri</h3>
					<?php 
					$q = mysql_query("SELECT gbr_gallery,jdl_gallery FROM gallery LIMIT 6");
					while($arr = mysql_fetch_array($q)) {
						echo '
					<div class="footer-grd">
						<a class="fancybox" data-fancybox-group="gallery" title="'.$arr[1].'" href="/img_galeri/'.$arr[0].'">
							<img style="width:100px !important; height:70px !important;" src="/img_galeri/'.$arr[0].'" class="img-responsive" alt=" ">
						</a>
					</div>';
					} ?>
	
					<div class="clearfix"> </div>
				</div>
		    <div class="col-md-3 ftr-grid animated wow fadeInRight" data-wow-delay=".5s">
		    	<?php echo getHtml('kode-16'); ?>
		    </div>
			<div class="clearfix"> </div>
		</div>
		<?php echo getHtml('kode-17'); ?>
	</div>
</div>
<!--footer-->
</body>
</html>