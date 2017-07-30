<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ComputerService</title>
<link href="../css/login.css" rel="stylesheet" type="text/css" />
<link href="../css/registextbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(../Image/white-wallpaper-18.jpg);
}
</style>
</head>

<?php
//session_start();

$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");

$objDB = mysql_select_db("project2");

$strSQL = "SELECT * FROM admin_db  ";

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

?>
<body topmargin="0">
<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr>
      <td width="248">
        <div id="login">
  
   <?php
while($objResult = mysql_fetch_array($objQuery))
{
?>  <h1>สวัสดีคุณ : <?php echo $objResult["name"];?></h1>   
 
<?php
}
?>
<a href=""> <input  type="button" name="button3" id="button2" value="แก้ไขข้อมูลส่วนตัว"  ></a>
 <a href="/project2/Technic/technician.php"> <input  type="button" name="button1" id="button1" value="ช่างซ่อม"  ></a>
  <a href="/project2/Technic/memberlist.php"><input type="button" name="button5" id="button5" value="สมาชิก"></a>
   <a href="/project2/Technic/fix.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
  <a href="/project2/Technic/device.php"><input type="button" name="button7" id="button7" value="เบิก-คืน"></a>
  <a href="/project2/Technic/Webboard.php"><input type="button" name="button8" id="button8" value="กระทู้"></a>
  <a href="/project2/Technic/report.php"><input type="button" name="button2" id="button3" value="รายงาน"></a>
        </div>

        
      <td width="657" rowspan="9" align="left" valign="top">&nbsp;</td>
    </tr>
    
   
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
