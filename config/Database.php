<?php	
require_once('fungsi_validasi.php');

class Database {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "fajarlabs";
	public static $instance = null;
	private $db = null;

	public static function getIntance() {
		if(self::$instance == null) {
			self::$instance = new Database();
		}
		return self::$instance;
	}

	public function __construct() {
		try {
		    $this->db = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
		    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function select($query = null, $arrayBindParam = array()) {
		$sth = $this->db->prepare($query);
		foreach($arrayBindParam as $idx => $obj) {
			$sth->bindParam($obj->key,$obj->val, $obj->type_param);
		}
		$sth->execute();
		$o = new stdClass();
		$o->result = $sth->fetchAll(PDO::FETCH_OBJ);
		$o->num_rows = count($o->result);
		return $o;
	}

	public function insert($query = null, $arrayBindParam = array()) {
		$sth = $this->db->prepare($query);
		foreach($arrayBindParam as $idx => $obj) {
			$sth->bindParam($obj->key,$obj->val, $obj->type_param);
		}
		$sth->execute();
	}

	public function update($query = null, $arrayBindParam = array()) {
		$sth = $this->db->prepare($query);
		foreach($arrayBindParam as $idx => $obj) {
			$sth->bindParam($obj->key,$obj->val, $obj->type_param);
		}
		$sth->execute();
	}

	public function delete($query = null, $arrayBindParam = array()) {
		$sth = $this->db->prepare($query);
		foreach($arrayBindParam as $idx => $obj) {
			$sth->bindParam($obj->key,$obj->val, $obj->type_param);
		}
		$sth->execute();
	}

	public static function content($key, $val, $type_param) {
		$o = new stdClass();
		$o->key = $key;
		$o->val = $val;
		$o->type_param = $type_param;
		return $o;
	}
}


$DB = Database::getIntance();

$val = new Validasi;



?>
