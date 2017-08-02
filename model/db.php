<?php 

	$dbuser = 'root';
	$dbpass = 'root';
	$dbh = new PDO('mysql:host=localhost;dbname=project2', $dbuser, $dbpass);
	$dbh->exec("set names utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	

?>