<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<?PHP
include("connect.php");
$flname=$_POST["name"];
$type=$_POST["type"];
$date=$_POST["date"];


$sql = "select * from device_db ";
$sqlQuery = mysql_query($sql) or die("cannot query");
$num = mysql_num_rows($sqlQuery);
if(mysql_num_rows($sqlQuery)==0){
	$sql1 =" INSERT INTO  `project2`.`device_db` (
`flname` ,
`type` ,
`date`
)
VALUES ( '$name','$type',  '$date');";
	$sqlQuery1=mysql_query($sql1) or die ("can't");
	echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=home.html'>";
}else if(mysql_num_rows($sqlQuery)>=1){
	echo "<script type='text/javascri'>alert('ชื่อผู้ใช้งานซ้ำ กรุณาใช้ชื่ออื่น');</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.html'>";
}else{
	echo "<script type='text/javascri'>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.html'>";
}

?>
<body>
</body>
</html>

