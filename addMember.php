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
$flname=$_POST["flname"];
$lastname=$_POST["lastname"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$address=$_POST["address"];
$sector=$_POST["select"];


$sql = "select * from member_db where username = '$username' ;";
$sqlQuery = mysql_query($sql) or die("cannot query");
$num = mysql_num_rows($sqlQuery);
if(mysql_num_rows($sqlQuery)==0){
	$sql1 = "INSERT INTO  `project2`.`member_db` (
`username` ,
`password` ,
`name` ,
`lastname` ,
`phone` ,
`email` ,
`address` ,
`sector` 

)
VALUES (  '$username',  '$password',  '$flname',  '$lastname',  '$tel',  '$email',  '$address ',  '$sector');";
	$sqlQuery1=mysql_query($sql1) or die ("can't");
	echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=Admin/memberlist.php'>";
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

