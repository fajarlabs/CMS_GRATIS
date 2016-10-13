<?php

$cek=umenu_akses("?module=galeri_video",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=galeri_video'><b>Galeri Video</b></a></li>"; 
}

$cek=umenu_akses("?module=kategori_galeri_video",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=kategori_galeri_video'><b>Kategori Video</b></a></li>";
}

?>
