<?php 

define("PATH",dirname(__DIR__)); if(!defined('PATH')) die();
define("MODE","production");

if(MODE == "development")
  error_reporting(E_ALL);
else 
  error_reporting(0);

/* autoload semua file config */
/* include semua file yang berada didalam folder packages */
$arrFiles = scandir(PATH."/packages/");
foreach($arrFiles as $idx => $file) {
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  if($ext == "php") {
    include PATH."/packages/".$file;
  }
}

Session::start(); /* session dimulai */

/* load config */
include PATH."/config/library.php";
include PATH."/config/fungsi_thumb.php";
include PATH."/config/fungsi_seo.php";
include PATH."/config/koneksi.php";

/* init disini */ 
$DB = Database::getIntance();
$val = new Validasi;

/* deprecated */
function user_akses($mod,$id){
  global $DB;
	$link = "?module=".$mod;
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":id", $id, PDO::PARAM_INT);
  $arrBindParam[] = Database::bind(":link", $link, PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session= :id AND modul.link = :link ", $arrBindParam);
	return $oResult->num_rows;
}

function umenu_akses($link,$id){
  global $DB;
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":id", $id, PDO::PARAM_INT);
  $arrBindParam[] = Database::bind(":link", $link, PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session= :id AND modul.link = :link ", $arrBindParam);
  return $oResult->num_rows;
}

function akses_salah(){
	$pesan = "<link href='style.css' rel='stylesheet' type='text/css'><center>Maaf Anda tidak berhak mengakses halaman ini</center>";
 	$pesan.= "<meta http-equiv='refresh' content='2;url=media.php?module=home'>";
	return $pesan;
}

function cekMenu($array = array()){
    $i = 0;
    $i += (Session::get("leveluser") =="admin" ? 1 : 0);
    foreach($array as $key => $val) 
      $i += umenu_akses("?module={$val}",Session::get('sessid'));
    return $i;
}

?>