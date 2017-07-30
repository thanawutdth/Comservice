<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>








<body>
<?
include("connect.php");
 $sql =mysql_query("SELECT * FROM image_path ");
//$resultimg = mysql_fetch_row("$sql");
while( $row = mysql_fetch_row( $sql ) ){ $IMDs[] = $row[0]; }
echo "<img src=''".$IMDs[0]."'/>";
?>
</body>
</html>