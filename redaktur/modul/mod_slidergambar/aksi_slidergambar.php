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

  if($module == "slidergambar" && $act == "add") {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak = rand(000000,999999);
    $nama_file = $acak.$nama_file;
    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
    $ext = strtolower($ext);
    if($ext == "jpg" || $ext == "png" || $ext == "gif" || $ext == "jpeg" ) {
      UploadGambarSlider($nama_file);
    } else {
      die("Upload gambar gagal!");
    }

    mysql_query("INSERT INTO slider_gambar (gambar,judul,keterangan) VALUES ('$nama_file','$judul','$keterangan')");
    header('location:../../media.php?module='.$module);
  }

  if($module == "slidergambar" && $act == "update") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    if(isset($_FILES['fupload']['tmp_name'])) {
      $lokasi_file = $_FILES['fupload']['tmp_name'];
      $nama_file   = $_FILES['fupload']['name'];
      $acak = rand(000000,999999);
      $nama_file = $acak.$nama_file;
      $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
      $ext = strtolower($ext);
      if($ext == "jpg" || $ext == "png" || $ext == "gif" || $ext == "jpeg" ) {
        UploadGambarSlider($nama_file);
        mysql_query("UPDATE slider_gambar SET judul = '$judul',gambar = '$nama_file', keterangan = '$keterangan' WHERE id = '$id'");
      } 
      
    } else {
      mysql_query("UPDATE slider_gambar SET judul = '$judul', keterangan = '$keterangan' WHERE id = '$id'");
    }

    header('location:../../media.php?module='.$module);
  }

  if($module == "slidergambar" && $act == "hapus") {
      $id = $_GET['id'];
      $q = mysql_query("SELECT * FROM slider_gambar WHERE id='$id'");
      $r = mysql_fetch_array($q);
      mysql_query("DELETE FROM slider_gambar WHERE id='$id'");
      @unlink('../../../img_slider/'.$r['gambar']);
      header('location:../../media.php?module='.$module);
  }


}
?>
