<?php
/* Ini diload jika bukan file include dari sini */
if(file_exists("../system/load.php")) include "../system/load.php"; else die("Access denied!");

$username = Security::antiInjection(Post::get("username"));
$pass     = Security::antiInjection(md5(Post::get("password")));

if (!ctype_alnum($username) OR !ctype_alnum($pass))
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
else {
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":username",$username,PDO::PARAM_STR);
  $arrBindParam[] = Database::bind(":password",$pass,PDO::PARAM_STR);
  $arrBindParam[] = Database::bind(":blokir","N",PDO::PARAM_STR);
  $oResult = $DB->select("SELECT * FROM users WHERE username = :username AND password = :password AND blokir = :blokir", $arrBindParam);

  if ($oResult->num_rows > 0) {
    Session::start();
    Session::add("username",$oResult->result[0]->username);
    Session::add("namalengkap",$oResult->result[0]->nama_lengkap);
    Session::add("passuser",$oResult->result[0]->password);
    Session::add("sessid",$oResult->result[0]->id_session);
    Session::add("leveluser",$oResult->result[0]->level);
    header('location:media.php?module=home');
  } else {

   echo "<link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

   echo "
   </head>
   <body class='special-page'>
   <div id='container'>
   <section id='error-number'>
   
   <img src='img/lock.png'>
   <h1>LOGIN GAGAL</h1>
   
   <p><span class style=\"font-size:14px; color:#ccc;\">Username atau Password anda tidak sesuai.<br>
   Atau akun anda sedang diblokir.</p></span><br/>
   
   </section>
   
   <section id='error-text'>
   <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
   </section>
   </div>";

}
}
?>
