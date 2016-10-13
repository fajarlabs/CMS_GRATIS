<?php

$cek=umenu_akses("?module=identitas",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=identitas'><b>Identitas Website</b></a></li>"; 
}

$cek=umenu_akses("?module=menu",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=menu'><b>Menu Website</b></a></li>";
}

$cek=umenu_akses("?module=logo",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){ 
echo "<li><a href='?module=logo'><b>Logo Website</b></a></li>";
}

$cek=umenu_akses("?module=templates",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=templates'><b>Template Website</b></a></li>";
}

$cek=umenu_akses("?module=background",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=background'><b>Background Website</b></a></li>";}

?>
