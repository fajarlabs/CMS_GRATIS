<?php 
  if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        ob_start("ob_gzhandler");
    else
        ob_start();
  session_start();
  
  include "system/load.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_badword.php";
  include "config/fungsi_kalender.php";
  include "config/option.php";

  function getHtml($kode) {
    $kode = mysql_real_escape_string($kode);
    $q = mysql_query("SELECT html FROM kode_html WHERE kode = '$kode'");
    $r = mysql_fetch_array($q);
    return $r[0];
  }

  function readMore($str,$length=20,$href="<a class=\"more\" href=\"singlepage.html\">Baca selengkapnya</a>") {
    $string = strip_tags($str);
    $explod = explode(" ",$string);
    $strReadMore = "";
    if(count($explod) > $length) {
      for($i = 0; $i < $length; $i++) {
        $strReadMore .=$explod[$i]." ";
      }
      $strReadMore = $strReadMore. "....<br />".$href;
    } else {
      for($i = 0; $i < $length; $i++) {
        $strReadMore .=$explod[$i]." ";
      }
    }
    return $strReadMore;
  } 

  // Memilih template yang aktif saat ini
  $pilih_template=mysql_query("SELECT folder FROM templates WHERE aktif='Y'");
  $f=mysql_fetch_array($pilih_template);
  include "$f[folder]/template.php"; 
?>