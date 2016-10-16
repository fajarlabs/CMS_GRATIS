<?php

$cek=umenu_akses("?module=user",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){ 
echo "<li><a href='?module=user'><b>Manajemen User</b></a></li>";
}


// $cek=umenu_akses("?module=modul",Session::get("sessid"));
// if($cek==1 OR Session::get("leveluser")=='admin'){ 
// echo "<li><a href='?module=modul'><b>Manajemen Modul</b></a></li>";
// }


?>
