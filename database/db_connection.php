<?php
	//$host = "localhost";
	$host = "localhost";// web ip
	$user = "root";
	$pwd = "";
	$db = "parkeasy";
	//$site_root = "/tds/";

	$q = new mysqli($host, $user, $pwd, $db);
	include_once 'sqli.php';
?>
