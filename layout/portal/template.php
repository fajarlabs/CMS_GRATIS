<?php //error_reporting(0); ?>
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
	var arrSlide = ["banner-2.jpg","banner-3.jpg","banner-4.jpg","banner-1.jpg"];
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
			console.log(i);
		},
		after: function () {
			console.log(arrSlide[i]);
			$('.banner').css("background-image","url('http://localhost/fajarlabs/layout/portal/images/"+arrSlide[i]+"')");
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
								<image height="80px" src="<?php echo $f['folder']; ?>/images/metro-green.png" />
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

						<ul class="nav navbar-nav navbar-left animated wow fadeInRight" data-wow-delay=".5s">
						<?php
						/*
						function get_menu($data, $parent = 0) {
						  	static $i = 1;
						  	$tab = str_repeat(" ", $i);
						  	if (isset($data[$parent])) {
							  	$html = "$tab<li>";
							  	$i++;
							  	foreach ($data[$parent] as $v) {
								  	$child = get_menu($data, $v->id_menu);
								  	$html .= "$tab<li class='$v->css'>";
								  	$html .= '<a href="'.$v->link.'">'.$v->nama_menu.'</a>';
								  	if ($child) {
									  	$i--;
									  	$html .= "<ul>$child";
									  	$html .= "$tab</ul>";
								  	}
								  	$html .= '</li>';
							  	}
							  	$html .= "$tab</li>";
							  	return $html;
						  	} else 
						  		return false;
						}
						  
						$result = mysql_query("SELECT * FROM menu WHERE aktif='Ya' ORDER BY id_menu");
						while ($row = mysql_fetch_object($result)) {
							$data[$row->id_parent][] = $row;
						}

						$menu = get_menu($data);
						echo "$menu";*/

						?>
						<li class="active"><a href="#" class=""><i class="icon-home"></i> Beranda</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-folder-open"></i> Galeri <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kota Jakarta</a>
                                </li>
                                <li><a href="#">Monumen Nasional</a></li>
                                <li><a href="#">Kuliner Nusantara</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#" class=""><i class="icon-phone"></i> Kontak</a></li>
                        <li class=""><a href="#" class=""><i class="icon-user"></i> Profil</a></li>
						</ul>
						<form class="navbar-form navbar-right" action="#" method="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Cari Artikel">
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
		    	<h3>Profil</h3>
		    	<p>[No Data]</p>
		    </div>
		    <div class="col-md-3 ftr-grid animated wow fadeInDown animated" data-wow-delay=".5s">
		    	<h3>Kategori Halaman</h3>
		    	<ul>
		    		<li><a href="singlepage.html">Kuliner</a></li>
		    		<li><a href="singlepage.html">Wisata</a></li>
		    		<li><a href="singlepage.html">Monumen Sejarah</a></li>
		    		<li><a href="singlepage.html">Metropolitan</a></li>
		    	</ul>
		    </div>
		    <div class="col-md-3 ftr-grid animated wow fadeInUp animated" data-wow-delay=".5s">
					<h3>Galeri</h3>
					<div class="footer-grd">
					
						<a href="singlepage.html">
						
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="footer-grd">
						<a href="singlepage.html">
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="footer-grd">
						<a href="singlepage.html">
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="clearfix"> </div>
					<div class="footer-grd">
						<a href="singlepage.html">
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="footer-grd">
						<a href="singlepage.html">
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="footer-grd">
						<a href="singlepage.html">
							<img src="<?php echo $f['folder']; ?>/images/banner-1.jpg" class="img-responsive" alt=" ">
						</a>
					</div>
					<div class="clearfix"> </div>
				</div>
		    <div class="col-md-3 ftr-grid animated wow fadeInRight" data-wow-delay=".5s">
		    	<h3>Ikuti Kami</h3>
		    	<ul>
		    		<li><a href="#">Facebook</a></li>
		    		<li><a href="#">Twitter</a></li>
		    		<li><a href="#">Google +</a></li>
		    		<li><a href="#">Skype</a></li>
		    	</ul>
		    </div>
			<div class="clearfix"> </div>
		</div>
		<div class="copy-right">
			   <p class="animated wow fadeInRight" data-wow-delay=".5s">© 2016 Web Portal . All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
				<div class="copy-rights animated wow fadeInLeft" data-wow-delay=".5s">
						<ul>
							<li><a href="#"><span class="fa"> </span></a></li>
							<li><a href="#"><span class="tw"> </span></a></li>
							<li><a href="#"><span class="g"> </span></a></li>
						</ul>
						<div class="clearfix"></div>
				 </div>
		  </div>
	</div>
</div>
<!--footer-->
</body>
</html>