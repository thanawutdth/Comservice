<? session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<?PHP
include("connect.php");
$username=$_POST["username"];
$password=$_POST["password"];	
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$phone=$_POST["tel"];
$email=$_POST["email"];
$position=$_POST["selectposition"];


echo $sql;

$sql = "select * from admin_db where username='$username'";
$sqlQuery = mysql_query($sql) or die("cannot query");
$num = mysql_num_rows($sqlQuery);
if(mysql_num_rows($sqlQuery)==0){
	$sql1 = "INSERT INTO  `Project2`.`admin_db` (
`username` ,
`password` ,
`name` ,
`lastname` ,
`phone` ,
`email`,
`position`
)VALUES ('$username',  '$password',  '$fname',  '$lname',  '$phone',  '$email','$position');";
	$sqlQuery1=mysql_query($sql1) or die ("can't");
	
	echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=Admin/Admin_Technic.php'>";
}else if(mysql_num_rows($sqlQuery)>=1){
	echo "<script type='text/javascri'>alert('ชื่อผู้ใช้งานซ้ำ กรุณาใช้ชื่ออื่น');</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.html'>";
}else{
	echo "<script type='text/javascri'>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.html'>";
}
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
?>
<body>
</body>
</html>

