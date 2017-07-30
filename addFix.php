<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<?PHP
include("connect.php");
$name=$_POST["name"];
$lastname=$_POST["lastname"];	
$date=$_POST["date"];
$Building=$_POST["building"];
$type=$_POST["type"];
$detail=$_POST["detail"];
$phone=$_POST["phone"];



$sql = "select * from fix_db where name = '$name' ;";
$sqlQuery = mysql_query($sql) or die("cannot query");
$num = mysql_num_rows($sqlQuery);
if(mysql_num_rows($sqlQuery)==0){
	$sql1 = "INSERT INTO  `project2`.`fix_db` (

`name` ,
`lastname` ,
`date` ,
`Building` ,
`type` ,
`detail` ,
`phone` )
VALUES (  '$name',  '$lastname',  '$date',  '$Building',  '$type',  '$detail',  '$phone');";
	$sqlQuery1=mysql_query($sql1) or die ("can't");
	echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=Listrepairing/list_repair.php'>";//goto tablefix
}else if(mysql_num_rows($sqlQuery)>=1){
	echo "<script type='text/javascri'>alert('ชื่อผู้ใช้งานซ้ำ กรุณาใช้ชื่ออื่น');</script>";
	//echo "<meta http-equiv='refresh' content='0;url='>";
	echo "page error";
}else{
	echo "<script type='text/javascri'>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
	//echo "<meta http-equiv='refresh' content='0;url=home.html'>";
	echo "page error2";
}
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
?>
<body>
</body>
</html>

