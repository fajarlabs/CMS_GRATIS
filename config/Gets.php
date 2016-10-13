<?php 

class Gets { 	
	public static function get($key="") {
		$result = "";
		if(isset($_GET[$key])) {
			$result = $_GET[$key];
		}
		return $result;
	}

	public static function add($key="", $val="") {
		$result = false;
		if(!$_GET[$key]) {
			$result = true;
			$_GET[$key] = $val;
		}

		return $result;
	}

	public static function remove($key="") {
		$result = false;
		if(!$_GET[$key]) {
			$result = true;
			unset($_GET[$key]);
		}

		return $result;
	}
}