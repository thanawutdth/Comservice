<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php 
include("../connect.php");
$date_q=date("d/m/y/");
$sql = "INSERT INTO  `project2`.`webboard_ans` (
`id_question` ,
`name` ,
`message` ,
`email` ,
`date_a`
)VALUES (  '$id_question',  '$name',  '$message',  '$email',  '$date_a');";
$dbquery = mysql_db_query($dbname,$sql);
mysql_close();

print "<br><div align = center><b>ขอบคุณสำหรับความคิดเห็น</b> </div></br>";
print "<div align = center><a href = \"Webboard_ans.php?id_question=$id_question\">กลับไปดูกระทู้ที่คุณตอบ</a></div>";



?>











<body>
</body>
</html>