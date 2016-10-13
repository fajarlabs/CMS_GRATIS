<?php

$cek=umenu_akses("?module=galeri",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=galeri'><b>Galeri Website</b></a></li>"; 
}

$cek=umenu_akses("?module=kategori_galeri",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=kategori_galeri'><b>Kategori Galeri</b></a></li>";
}

?>
