<?php

$cek=umenu_akses("?module=halamanstatis",Session::get("sessid"));
if($cek==1 OR Session::get("leveluser")=='admin'){
echo "<li><a href='?module=halamanstatis'><b>Halaman Statis</b></a></li>";
}

?>
