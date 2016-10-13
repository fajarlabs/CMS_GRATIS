<?php 

class Files {
	public static function get($key) {
		$result = null;
		if(isset($_FILES[$key])) {
			$o = new stdClass();
			$o->tmp_name = $_FILES[$key]['tmp_name'];
	  		$o->type     = $_FILES[$key]['type'];
	  		$o->size     = $_FILES[$key]['size'];
	  		$o->name     = $_FILES[$key]['name'];
	  		$o->error    = $_FILES[$key]['error'];
	  		$result = $o;
  		}
  		return $result;
	}



	public static function remove($file) {
		$path = "../../../".$file;
			unlink($path);
	}
}