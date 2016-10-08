<?php 

$LANG['ID']['login_error_title']   = "Login Error";
$LANG['ID']['login_error_form']    = "Login Gagal";
$LANG['ID']['login_error_content'] = "Username atau Password anda tidak sesuai.<br>Atau akun anda sedang diblokir.";
$LANG['ID']['login_error_suggest'] = "ULANGI LAGI";



/* Setting default */
$SETTING_LANG = "ID";

/* get lang */
function L($label = NULL) {
	global $SETTING_LANG,$LANG;
	return $LANG[$SETTING_LANG][$label];
}

?>