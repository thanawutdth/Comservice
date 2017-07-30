<? session_start();?>
<?php
	session_start();
	mysql_connect("localhost","root","1234");
	mysql_select_db("project2");
	
	
	
	$strSQL = "SELECT * FROM viewdatabase WHERE username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	
	if(!$objResult)
	{
	
			
			echo "<script type='text/javascript'>alert('username and password incorrect');history.back();</script>";
	}
	
	else
	{
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["position"] = $objResult["position"];

			session_write_close();
			
			if($objResult["position"] == 1)// 1 = Admin
	   	    {
			    echo "<meta http-equiv='refresh' content='0;url=Admin/adminlogin.php'>";
			}
		   if($objResult["position"] == 2)// 2 = Technic
		   	{
				echo "<meta http-equiv='refresh' content='0;url=Technic/techniclogin'>";
				//header("location:staff/index.php");
			}
			if($objResult["position"] == 3)// 2 = member
		   	{
				echo "<meta http-equiv='refresh' content='0;url=Member/firstpage_member.php'>";
				//header("location:staff/index.php");
			}

	}
	

	mysql_close();
?>