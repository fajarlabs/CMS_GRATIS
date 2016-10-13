<?php
$arrBindParam = array();
$arrBindParam[] = Database::content(":username",Session::get("username") , PDO::PARAM_STR);
$oResult = $DB->select("SELECT * FROM users WHERE username = :username",$arrBindParam);
$imageFoto = (isset($oResult->result[0]->foto) ? $oResult->result[0]->foto : "");
echo "<img class='img-left framed' width=60 src='../foto_user/".$imageFoto."' border=\"0\" />"; 
?>
