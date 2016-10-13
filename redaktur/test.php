<?php 

include "../config/Database.php";

$oResult = $DB->select("SELECT * FROM users");

echo "<pre>";
echo print_r($oResult);
echo "</pre>";