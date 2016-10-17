  <?php if(!defined("PATH")) die("Access denied!"); ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
	<meta charset="utf-8"/>
	<title>.:: HALAMAN ADMINISTRATOR ::.</title>
	
	<meta charset="utf-8" />
	<link rel="dns-prefetch" href="http://fonts.googleapis.com/" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	 <link rel="shortcut icon" href="../favicon.png" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="css/zalstyle.css" />
	<link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css" />
	<script src="js/libs/modernizr-2.0.6.min.js"></script> 
	
	<script language="javascript" type="text/javascript" src="editor/tiny_mce_src.js"></script>
  <script type="text/javascript">
    tinyMCE.init({
    		mode : "textareas",
    		theme : "advanced",
    		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
    		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
    		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
    		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
    		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
    		theme_advanced_buttons3_add : "emotions,flash",
    		theme_advanced_toolbar_location : "top",
    		theme_advanced_toolbar_align : "left",
    		theme_advanced_statusbar_location : "bottom",
    		valid_elements : '*[*]', /* all element allowed */
    		file_browser_callback : "fileBrowserCallBack",
    		paste_use_dialog : false,
    		theme_advanced_resizing : true,
    		theme_advanced_resize_horizontal : false,
    		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
    		apply_source_formatting : true
    });

  	function fileBrowserCallBack(field_name, url, type, win) {
  		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
  		var enableAutoTypeSelection = true;
  		
  		var cType;
  		tinymcpuk_field = field_name;
  		tinymcpuk = win;
  		
  		switch (type) {
  			case "image":
  				cType = "Image";
  				break;
  			case "flash":
  				cType = "Flash";
  				break;
  			case "file":
  				cType = "File";
  				break;
  		}
  		
  		if (enableAutoTypeSelection && cType) {
  			connector += "&Type=" + cType;
  		}
  		
  		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
  	}
</script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
	

  </head>
  <body id="top">
  <div id="container">
  <div id="header-surround">
  <header id="header">
  <img src="img/logo.png" alt="Grape" class="logo" /> 
				
			
									
  <div id="user-info">
  <p> 
  <a target='_blank' href=../index.html  class="button blue">Lihat Web</a> 
  <a href="aksi_logout.php" class="button red">Logout</a> </p>
  </div>
  </header>
  </div>
  <div class="fix-shadow-bottom-height"></div>
  
  
  <aside id="sidebar">
  <section id="login-details">
  <?php
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":username",Session::get("username") , PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM users WHERE username = :username",$arrBindParam);
  $imageFoto = (isset($oResult->result[0]->foto) ? $oResult->result[0]->foto : "");
  echo "<img class='img-left framed' width=60 src='../foto_user/".$imageFoto."' border=\"0\" />"; 
  ?>
  <div class='selamat'><SCRIPT language=JavaScript>var d = new Date();
  var h = d.getHours();
  if (h < 11) { document.write('Selamat pagi,'); }
  else { if (h < 15) { document.write('Selamat siang,'); }
  else { if (h < 19) { document.write('Selamat sore,'); }
  else { if (h <= 23) { document.write('Selamat malam,'); }
  }}}</SCRIPT></div>
  <h3>
  <?php $arrBindParam = array();
  $arrBindParam[] = Database::bind(":username",Session::get("username") , PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM users WHERE username = :username",$arrBindParam);
  $namaLengkap = (isset($oResult->result[0]->nama_lengkap) ? $oResult->result[0]->nama_lengkap : "");
  echo "<div class='nama_user'>".$namaLengkap."</div>"; ?>
  </h3>
  
  <?php
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":dibaca", "N", PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM hubungi WHERE dibaca = :dibaca", $arrBindParam);
  echo "<span class=messages> <a href='?module=hubungi'>
  <img src='img/icons/packs/fugue/16x16/mail.png' alt='Pesan'>  <span class style=\"color:#66CCFF;\"><b>".$oResult->num_rows."</b></span>
  <span class style=\"font-size:11px; color:#fff;\"> belum dibaca</span></a> </span>";
  ?>
  
  
  <div class="clearfix"></div>
  </section>
			
  <nav id="nav">
  <ul class="menu collapsible shadow-bottom">

  <li>
  <?php if((cekMenu(array("artikel","kategori_artikel")) > 0)) { ?>
  <a href="javascript:void(0);">MODUL ARTIKEL</a> 
  <ul class="sub">
  <?php include "menu_artikel.php"; ?>
  </ul>
  <?php } ?>
  </li>

  <li>
  <?php if((cekMenu(array("galeri","kategori_galeri")) > 0)) { ?>
  <a href="javascript:void(0);">MODUL GALERI</a> 
  <ul class="sub">
  <?php include "menu_galeri.php"; ?>
  </ul>
  <?php } ?>
  </li>

  <li>
  <?php if((cekMenu(array("halaman_statis")) > 0)) { ?>
  <a href="javascript:void(0);">MODUL HALAMAN</a> 
  <ul class="sub">
  <?php include "menu_halaman.php"; ?>
  </ul>
  <?php } ?>
  </li>

  <li>
  <?php if((cekMenu(array("kontak_kami")) > 0)) { ?>
  <a href="javascript:void(0);">MODUL KONTAK KAMI</a> 
  <ul class="sub">
  <?php include "menu_kontak_kami.php"; ?>
  </ul>
  <?php } ?>
  </li>

  <li>
  <?php if((cekMenu(array("setting")) > 0)) { ?>
  <a href="javascript:void(0);">MODUL SETTING</a> 
  <ul class="sub">
  <?php include "menu_setting.php"; ?>
  </ul>
  <?php } ?>
  </li>

  <li>
  <?php if((cekMenu(array("user","modul")) > 0)) { ?>
  <a href="javascript:void(0);">
   MODUL MANAJEMEN</a> 
  <ul class="sub">
  <?php include "menu_manajemen.php"; ?>
  </ul>
  <?php } ?>
  </li>

  </ul>
  </nav>
  </aside>
		
  <div id="main" role="main">
  <div id="title-bar">
  <ul id="breadcrumbs">
  <li><a href="?module=home" title="Beranda"><span id="bc-home"></span></a></li>
  <li class="no-hover">Selamat Datang di Halaman Administrator. </li>
  </ul>
  </div>
  <div class="shadow-bottom shadow-titlebar"></div>
  <?php include "form_module.php"; ?>
  </div>
  
  <script src="js/jquery.min.js"></script> 
  <script>window.jQuery||document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>');</script>
 
  <script defer type="text/javascript" src="js/zal.js"></script>

  </body></html>