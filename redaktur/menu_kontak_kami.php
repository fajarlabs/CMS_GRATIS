<?php

$cek=umenu_akses("?module=hubungi",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=hubungi'><b>Pesan Masuk</b></a></li>";
}

?>