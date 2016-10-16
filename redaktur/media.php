<?php
/* Ini diload jika bukan file include dari sini */
if(file_exists("../system/load.php")) include "../system/load.php"; else die("Access denied!");

if (empty(Session::get("username")) AND empty(Session::get("passuser")))
  include "form_login.php";  
else
  include "form_utama.php";
?>