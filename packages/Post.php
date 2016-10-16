<?php 

class Post {
	public static function get($key="") {
		$result = "";
		if(isset($_POST[$key])) {
			$result = $_POST[$key];
		}
		return $result;
	}

	public static function add($key="", $val="") {
		$result = false;
		if(!$_POST[$key]) {
			$result = true;
			$_POST[$key] = $val;
		}

		return $result;
	}

	public static function remove($key="") {
		$result = false;
		if(!$_POST[$key]) {
			$result = true;
			unset($_POST[$key]);
		}

		return $result;
	}
}