<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

  error_reporting(0);
  include "../../../packages/Validasi.php";
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_thumb.php";

  $module=$_GET[module];
  $act=$_GET[act];

  // Update Kode HTML
  if ($module=='kodehtml' AND $act=='add'){
    $html = mysql_real_escape_string($_POST['html']);
    $judul = mysql_real_escape_string($_POST['judul']);
    $qid = mysql_query("SELECT max(id) FROM kode_html");
    if (!$qid) { die('Could not query:' . mysql_error());}
    $r = mysql_fetch_array($qid);
    mysql_query("INSERT INTO kode_html (kode,judul,html) VALUES ('kode-".($r[0]+1)."','$judul','$html');");

    header('location:../../media.php?module='.$module);
  }

  if ($module=='kodehtml' AND $act=='update'){
    $html = mysql_real_escape_string($_POST['html']);
    $judul = mysql_real_escape_string($_POST['judul']);
    $id = mysql_real_escape_string($_POST['id']);
    mysql_query("UPDATE kode_html SET judul = '$judul', html = '$html' WHERE id = '$id' ");

  	header('location:../../media.php?module='.$module);
  }

  if($module == "kodehtml" && $act == "hapus") {
    $id = mysql_real_escape_string($_GET['id']);
    mysql_query("DELETE FROM kode_html WHERE id = '$id'");

    header('location:../../media.php?module='.$module);
  }

}
?>
