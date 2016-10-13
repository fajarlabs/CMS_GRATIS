<?php 

class Session {
	public static $sessionFlag = false;
	public static function get($key="") {
		$result = "";
		if(isset($_SESSION[$key])) {
			$result = $_SESSION[$key];
		}
		return $result;
	}

	public static function add($key="", $val="") {
		$result = false;
		if(!$_SESSION[$key]) {
			$result = true;
			$_SESSION[$key] = $val;
		}

		return $result;
	}

	public static function remove($key="") {
		$result = false;
		if(!$_SESSION[$key]) {
			$result = true;
			unset($_SESSION[$key]);
		}

		return $result;
	}

	public static function start() {
		if(!self::$sessionFlag) {
			self::$sessionFlag = true;
			session_start();
		} else {
			echo "Penggunaan session lebih dari 1 kali, silahkan periksa code anda.";
		}
	}
	public static function removeAll() {
		session_destroy();
	}
}