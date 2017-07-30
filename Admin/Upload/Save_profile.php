<? session_start();?>
<?php
	session_start();
	
	mysql_connect("localhost","root","1234");
	mysql_select_db("project2");
	
	
	$strSQL = "UPDATE admin_db SET username = '".$_POST['username']."' ,
	password = '".$_POST['password']."',
	name = '".$_POST['name']."',
	lastname = '".$_POST['lastname']."',
	phone = '".$_POST['phone']."',
	email = '".$_POST['email']."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "Save Completed!<br>";		
	
	if($objResult["position"] == 1)// 1 = Admin
	{
		echo "<br> Go to <a href='Admin/adminlogin.php'>Admin page</a>";
	}
	if($objResult["position"] == 2)// 2 = Technic
	{
		echo "<br> Go to <a href='Technic/techniclogin.php'>Technic page</a>";
	}
	if($objResult["position"] == 3)// 2 = member
	{
	
		echo "<br> Go to <a href='Member/firstpage_member.php'>Member page</a>";
	}
	
	
	mysql_close();
?>