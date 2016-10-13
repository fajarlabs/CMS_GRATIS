<?php
$arrBindParam = array();
$arrBindParam[] = Database::content(":username",Session::get("username") , PDO::PARAM_STR);
$oResult = $DB->select("SELECT * FROM users WHERE username = :username",$arrBindParam);
$namaLengkap = (isset($oResult->result[0]->nama_lengkap) ? $oResult->result[0]->nama_lengkap : "");
echo "<div class='nama_user'>".$namaLengkap."</div>"; 
?>
