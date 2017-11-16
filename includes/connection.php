<?php
require("config.php");
//$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
//	mysql_select_db(DB_NAME) or die("Cannot select DB");
$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
$con->set_charset("utf8");
?>
