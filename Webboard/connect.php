
<?php
	$host="127.0.0.1";
	$user="root";
	$password="1234";
	$dbname="Project2";
	$conn=mysql_connect($host,$user,$password) or die("ไม่สามารถติดต่อกับฐานข้อมูลได้");
	$condb=mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
	echo "My comservice connected";
?>

