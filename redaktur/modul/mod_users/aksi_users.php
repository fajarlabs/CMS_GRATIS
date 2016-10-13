<?php
include "../../../config/importAll.php";
Session::start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

$module=Gets::get("module");
$act=Gets::get("act");

if ($module=='user' AND $act=='input'){
  $oFiles = Files::get("fupload");
  $lokasi_file    = $oFiles->tmp_name;
  $tipe_file      = $oFiles->type;
  $nama_file      = $oFiles->name;
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $pass=md5(Post::get("password"));
  
  if (!empty($lokasi_file)){
    UploadUser($nama_file_unik);
    $query = "INSERT INTO users(username,password,nama_lengkap,email, no_telp,foto,id_session) 
              VALUES(:username,'$pass',:nama_lengkap,:email,:no_telp,'$nama_file_unik','$pass')";
    $arrBindParam = array();
    $arrBindParam[] = Database::bind(":username", Post::get("username"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":nama_lengkap", Post::get("nama_lengkap"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":email", Post::get("email"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"), PDO::PARAM_STR);
    $DB->insert($query, $arrBindParam);

    $mod=count(Post::get("modul"));
    $modul=Post::get("modul");
    for($i=0;$i<$mod;$i++){
      $query = "INSERT INTO users_modul SET id_session = :pass , id_modul = :id_modul";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":id_modul", $modul[$i], PDO::PARAM_INT);
      $arrBindParam[] = Database::bind(":pass", $pass, PDO::PARAM_STR);
      $DB->insert($query,$arrBindParam);
    }
    URL::redirect($module);
  } else {
    $query = "INSERT INTO users(username,password,nama_lengkap,email, no_telp,id_session) 
              VALUES(:username,'$pass',:nama_lengkap,:email, :no_telp,'$pass')";
    $arrBindParam = array();
    $arrBindParam[] = Database::bind(":username", Post::get("username"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":nama_lengkap", Post::get("nama_lengkap"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":email", Post::get("email"), PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"), PDO::PARAM_STR);
    $DB->insert($query,$arrBindParam);

    $mod=count(Post::get("modul"));
    $modul=Post::get("modul");
    for($i=0;$i<$mod;$i++){
      $query = "INSERT INTO users_modul SET id_session = :pass , id_modul = :id_modul";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":id_modul", $modul[$i], PDO::PARAM_INT);
      $arrBindParam[] = Database::bind(":pass", $pass, PDO::PARAM_STR);
      $DB->insert($query,$arrBindParam);
    }
    URL::redirect($module);
  }
} else if ($module=='user' AND $act=='update') {
  $oFiles = Files::get("fupload");
  $lokasi_file    = $oFiles->tmp_name;
  $tipe_file      = $oFiles->type;
  $nama_file      = $oFiles->name;
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  if(Post::get("password")!=''){
    $pass=md5(Post::get("password"));
    if (empty($lokasi_file)){
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":nama_lengkap", Post::get("nama_lengkap"), PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":email", Post::get("email"), PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":blokir", Post::get("blokir"), PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"), PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
      $query = "UPDATE users SET password = '$pass',nama_lengkap = :nama_lengkap, email = :email , 
                blokir = :blokir , no_telp = :no_telp WHERE  id_session = :id";
      $DB->update($query,$arrBindParam);
      $mod=count(Post::get("modul"));
      $modul=Post::get("modul");
      for($i=0;$i<$mod;$i++){
        $query = "INSERT INTO users_modul SET id_session = :id , id_modul = :id_modul";
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":id_modul", $modul[$i], PDO::PARAM_INT);
        $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
        $DB->insert($query,$arrBindParam);
      }
      URL::redirect($module);
  } else {
      $query = "SELECT foto FROM users WHERE id_session = :id ";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":id", Post::get("id"),PDO::PARAM_STR);
      $oResult = $DB->select($query,$arrBindParam);
      $foto = isset($oResult->result[0]->foto) ? $oResult->result[0]->foto : "";

      /* delete foto */
      Files::remove("foto_banner/".$foto);
      Files::remove("foto_banner/".'small_'.$foto);
      UploadUser($nama_file_unik ,'../../../foto_banner/');

      $query = "UPDATE users SET password = '$pass', nama_lengkap = :nama_lengkap, email = :email,  
                blokir = :blokir, foto = '$nama_file_unik', no_telp = :no_telp WHERE id_session = :id ";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":nama_lengkap",Post::get("nama_lengkap"),PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":email",Post::get("email"),PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":blokir",Post::get("blokir"),PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"),PDO::PARAM_STR);
      $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
      $DB->update($query,$arrBindParam);

      $mod=count(Post::get("modul"));
      $modul=Post::get("modul");
      for($i=0;$i<$mod;$i++){
        $query = "INSERT INTO users_modul SET id_session = :id , id_modul = :id_modul";
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":id_modul", $modul[$i], PDO::PARAM_INT);
        $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
        $DB->insert($query,$arrBindParam);
      }
    }
  } else {
  if (empty($lokasi_file)){
    $query = "UPDATE users SET nama_lengkap = '$_POST[nama_lengkap]',email = '$_POST[email]', 
    blokir = '$_POST[blokir]', no_telp = '$_POST[no_telp]' WHERE  id_session = '$_POST[id]'";

    $query = "UPDATE users SET password = '$pass', nama_lengkap = :nama_lengkap, email = :email,  
              blokir = :blokir, no_telp = :no_telp WHERE id_session = :id ";
    $arrBindParam = array();
    $arrBindParam[] = Database::bind(":nama_lengkap",Post::get("nama_lengkap"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":email",Post::get("email"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":blokir",Post::get("blokir"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
    $DB->update($query,$arrBindParam);

    $mod=count(Post::get("modul"));
    $modul=Post::get("modul");
    for($i=0;$i<$mod;$i++){
        $query = "INSERT INTO users_modul SET id_session = :id , id_modul = :id_modul";
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":id_modul", $modul[$i], PDO::PARAM_INT);
        $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
        $DB->insert($query,$arrBindParam);
    }
    URL::redirect($module);
  } else {
    $query = "SELECT foto FROM users WHERE id_session = :id ";
    $arrBindParam = array();
    $arrBindParam[] = Database::bind(":id", Post::get("id"),PDO::PARAM_STR);
    $oResult = $DB->select($query,$arrBindParam);
    $foto = isset($oResult->result[0]->foto) ? $oResult->result[0]->foto : "";
    Files::remove("foto_banner/".$foto);
    Files::remove("foto_banner/small_".$foto);
    UploadUser($nama_file_unik ,'../../../foto_banner/');

    $query = "UPDATE users SET password = '$pass', nama_lengkap = :nama_lengkap, email = :email,  
              blokir = :blokir, foto = '$nama_file_unik', no_telp = :no_telp WHERE id_session = :id ";
    $arrBindParam = array();
    $arrBindParam[] = Database::bind(":nama_lengkap",Post::get("nama_lengkap"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":email",Post::get("email"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":blokir",Post::get("blokir"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":no_telp", Post::get("no_telp"),PDO::PARAM_STR);
    $arrBindParam[] = Database::bind(":id", Post::get("id"), PDO::PARAM_STR);
    $DB->update($query,$arrBindParam);

    $mod=count(Post::get("modul"));
    $modul=Post::get("modul");
    for($i=0;$i<$mod;$i++){
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":id",Post::get("id"),PDO::PARAM_STR);
      $query = "INSERT INTO users_modul SET id_session = :id, id_modul='$modul[$i]'";
      $DB->insert($query,$arrBindParam);
    }
  }
  }
  URL::redirect($module); 
} else if($module=='user' AND $act=='hapusmodule'){
  $id=abs((int)$_GET['id']);
  $query = "DELETE FROM users_modul WHERE id_umod= :id_umod";
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":id_umod",$id,PDO::PARAM_INT);
  $DB->delete($query,$arrBindParam);
  header('location:../../media.php?module='.$module);
}

}
?>
