<?php 

	$dbuser = 'root';
	$dbpass = 'root';
	$dbh = new PDO('mysql:host=localhost;dbname=nml2016', $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>