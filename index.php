<?php
  include "config/koneksi.php";
  include "rss.php";
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  header("location: $iden[url]"); 
?>
