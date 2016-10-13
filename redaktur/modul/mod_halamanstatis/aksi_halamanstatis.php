<?php
include "../../../config/importAll.php";

Session::start();

if (empty(Session::get("username")) AND empty(Session::get("passuser"))){
  echo "<link href='style.css' rel='stylesheet' type='text/css'><center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

  $module = Gets::get("module");
  $act    = Gets::get("act");
  
  if ($module=='halamanstatis' AND $act=='hapus'){
    $id = Gets::get("id");
    $query = "SELECT gambar FROM halamanstatis WHERE id_halaman = :id";
    $arrBindParam = array();
    $arrBindParam[] = Database::content(":id", $id, PDO::PARAM_INT);
    $oResult = $DB->select($query,$arrBindParam);
    if($oResult->num_rows > 0) {
      if ($oResult->result[0]->gambar != '') {
       $query = "DELETE FROM halamanstatis WHERE id_halaman = :id";
       $oResult = $DB->delete($query,$arrBindParam);
       Files::remove("foto_statis/".Gets::get("namafile"));   
       Files::remove("foto_statis/small_".Gets::get("namafile"));
     } else {
       $query = "DELETE FROM halamanstatis WHERE id_halaman = :id";
       $oResult = $DB->delete($query,$arrBindParam);
     }
   }
   URL::redirect($module);
 } else if ($module=='halamanstatis' AND $act=='input') {
  $oFiles = Files::get("fupload");
  $lokasi_file    = $oFiles->tmp_name;
  $tipe_file      = $oFiles->type;
  $nama_file      = $oFiles->name;
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  /* Apabila ada gambar yang diupload */
  if (!empty($lokasi_file)){
    UploadStatis($nama_file_unik);

    $judul       = Post::get("judul");
    $isi_halaman = Post::get("isi_halaman");
    $username    = Session::get("username");
    $dibaca      = Post::get("dibaca");
    $query       = "INSERT INTO halamanstatis(judul,judul_seo,isi_halaman,tgl_posting,gambar,username,dibaca,jam,hari) 
    VALUES(:judul , :judul_seo, :isi_halaman, '$tgl_sekarang', '$nama_file_unik', :username, :dibaca, '$jam_sekarang', '$hari_ini')";
    $arrBindParam = array();
    $arrBindParam[] = Database::content(":judul", $judul, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":judul_seo", seo_title($judul), PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":isi_halaman", $isi_halaman, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":username", $username, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":dibaca", $dibaca, PDO::PARAM_INT);
    $DB->insert($query,$arrBindParam);

    URL::redirect($module);
  } else {
    $judul       = Post::get("judul");
    $isi_halaman = Post::get("isi_halaman");
    $username    = Session::get("username");
    $dibaca      = Post::get("dibaca");
    $query       = "INSERT INTO halamanstatis(judul,judul_seo,isi_halaman,tgl_posting,username,dibaca,jam,hari) 
    VALUES(:judul , :judul_seo, :isi_halaman, '$tgl_sekarang', :username, :dibaca, '$jam_sekarang', '$hari_ini')";
    $arrBindParam = array();
    $arrBindParam[] = Database::content(":judul", $judul, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":judul_seo", seo_title($judul), PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":isi_halaman", $isi_halaman, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":username", $username, PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":dibaca", $dibaca, PDO::PARAM_INT);
    $DB->insert($query,$arrBindParam);

    URL::redirect($module);
  }
} else if ($module=='halamanstatis' AND $act=='update'){
  $oFiles = Files::get("fupload");
  $lokasi_file    = $oFiles->tmp_name;
  $tipe_file      = $oFiles->type;
  $nama_file      = $oFiles->name;
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    $arrBindParam = array();
    $arrBindParam[] = Database::content(":id", Post::get("id"), PDO::PARAM_INT);
    $arrBindParam[] = Database::content(":judul", Post::get("judul"), PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":judul_seo", seo_title(Post::get("judul")), PDO::PARAM_STR);
    $arrBindParam[] = Database::content(":isi_halaman", Post::get("isi_halaman"), PDO::PARAM_STR);
    $query = "UPDATE halamanstatis SET judul = :judul, judul_seo = :judul_seo, isi_halaman = :isi_halaman WHERE id_halaman = :id";
    $DB->delete($query,$arrBindParam);
    URL::redirect($module);
  } else {
    $query = "SELECT gambar FROM halamanstatis WHERE id_halaman = :id";
    $arrBindParam = array();
    $arrBindParam[] = Database::content(":id", Post::get("id"), PDO::PARAM_INT);
    $oResult = $DB->select($query,$arrBindParam);
    if($oResult->num_rows > 0) {
      echo $gambar = $oResult->result[0]->gambar;
      Files::remove('foto_statis/'.$gambar);
      Files::remove('foto_statis/small_'.$gambar);
      UploadStatis($nama_file_unik ,'../../../foto_statis/'); /* deprecated */
      $arrBindParam = array();
      $arrBindParam[] = Database::content(":id", Post::get("id"), PDO::PARAM_INT);
      $arrBindParam[] = Database::content(":judul", Post::get("judul"), PDO::PARAM_STR);
      $arrBindParam[] = Database::content(":judul_seo", seo_title(Post::get("judul")), PDO::PARAM_STR);
      $arrBindParam[] = Database::content(":isi_halaman", Post::get("isi_halaman"), PDO::PARAM_STR);
      $query = "UPDATE halamanstatis SET judul = :judul , judul_seo = :judul_seo,
      isi_halaman = :isi_halaman, gambar = '$nama_file_unik' WHERE id_halaman   = :id ";
      $DB->update($query,$arrBindParam);
    }
    URL::redirect($module);
 }
}
}
?>
