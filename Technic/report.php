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

        </td>
        
      <td width="657" rowspan="9" align="center" valign="top">
      <form id="Admin" name="addAdmin" method="post" action="/project2/addAdmin.php">
        <fieldset>
          <legend> <h3><span style="color:#2288BB">แอดมิน,ช่าง</span></h3></legend>
          <table width="476" height="270" border="0" align="center" id="regis"  >
            <tbody>
              <tr>
                <th height="49" scope="col" align="left">position</th>
                <th scope="col" align="left"><select name="selectposition" id="select">
                  <option>1</option>
                  <option>2</option>
                  </select></th>
                </tr>
              <tr>
                <th width="216" height="49" scope="col" align="left"><label>Username</label>
                  &nbsp;</th>
                <th width="250" scope="col" align="left"><label for="textfield"></label>
                  <input type="text" name="username" id="username" ></th>
                </tr>
              <tr>
                <td height="19"><label><strong>Password</strong></label>
                  <strong>&nbsp;</strong></td>
                <td ><input type="password" name="password" id="password" ></td>
                </tr>
              <tr>
                <td height="34"><strong>ชื่อ </strong></td>
                <td><input type="text" name="firstname" id="firstname" ></td>
                </tr>
              <tr>
                <td height="34">นามสกุล</td>
                <td><input type="text" name="lastname" id="lastname" ></td>
                </tr>
              <tr>
                <td><label><strong>เบอร์โทรศัพท์</strong></label>
                  <strong>&nbsp;</strong></td>
                <td><input type="tel" name="tel" id="tel"></td>
                </tr>
              <tr>
                <td><label><strong>E-mail</strong></label>
                  <strong>&nbsp;</strong></td>
                <td><input type="email" name="email" id="email"></td>
                </tr>
              <tr>
                <td><input type="submit" name="button" id="button" value="Submit"></td>
                <td><input type="reset" name="reset" id="reset" value="Reset"></td>
                </tr>
              </tbody>
          </table>
        </fieldset>
      </form></td>
    </tr>
    
   
   
      
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    
    
    <tr>
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
