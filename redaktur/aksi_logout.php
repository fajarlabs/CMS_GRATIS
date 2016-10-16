<?php
/* Ini diload jika bukan file include dari sini */
  if(file_exists("../system/load.php")) include "../system/load.php"; else die("Access denied!");
  
  Session::removeAll();
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '../index.html'</script>";
?>