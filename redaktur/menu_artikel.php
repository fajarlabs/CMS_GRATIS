<?php

$cek=umenu_akses("?module=artikel",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=artikel'><b>Artikel Website</b></a></li>"; 
}

$cek=umenu_akses("?module=kategori_artikel",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=kategori_artikel'><b>Kategori Artikel</b></a></li>";
}

?>
