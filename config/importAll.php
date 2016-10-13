<?php 
error_reporting(E_ALL);

define("WEB_ROOT",substr(dirname(__FILE__),0,strlen(dirname(__FILE__))-7));

include "Database.php";
include "Security.php";
include "Post.php";
include "Session.php";
include "Gets.php";
include "library.php";
include "fungsi_thumb.php";
include "fungsi_seo.php";
include "Files.php";
include "URL.php";
?>