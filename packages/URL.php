<?php 

class URL {
	public static function redirect($module) {
		header('location:../../media.php?module='.$module);
	}
}