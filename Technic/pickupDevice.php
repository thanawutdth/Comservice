<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ComputerService</title>
<link href="../css/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(../Image/white-wallpaper-18.jpg);
}
</style>
</head>

<body topmargin="0">
<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr>
      <td width="248">
        <div id="login">
  
  <h1>ADMIN</h1>
        </div>

        </td>
        
      <td width="657" rowspan="9" align="center" valign="top">&nbsp;&nbsp;<table width="518" height="52" border="1" align="center">
        <tbody>
          <tr>
            <th width="87" height="21" scope="col">name</th>
            <th width="93" scope="col">lastname</th>
            <th width="57" scope="col">type</th>
            <th width="40" scope="col">date</th>
            <th width="102" align="center" scope="col">deleate</th>
            </tr>
   <?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
          <tr>
            <td height="21"><?php echo $objResult["name"];?>&nbsp;</td>
            <td><?php echo $objResult["lastname"];?>&nbsp;</td>
            <td><?php echo $objResult["phone"];?>&nbsp;</td>
            <td><?php echo $objResult["email"];?>&nbsp;</td>
            <td align="center"><a href="">del</td>
            </tr>
          <?php
}
?>
        </tbody>
      </table></td>
    </tr>
    
    <tr>
      <td ><a href="technician.html"/><input  type="button" name="button1" id="button1" value="ช่างซ่อม"  ></td>
    </tr>
    <tr>
   
      <td><a href="regisformember.html"/><input type="button" name="button5" id="button5" value="สมาชิก"></td>
    </tr>
    <tr>
      <td><a href="fix.html"/><input type="button" name="button6" id="button6" value="แจ้งซ่อม"></td>
    </tr>
    <tr>
      <td><a href="pickupDevice.html"/><input type="button" name="button7" id="button7" value="เบิก-คืน"></td>
    </tr>
    <tr>
      <td><a href="webboard.html"/><input type="button" name="button8" id="button8" value="กระทู้"></td>
    </tr>
    <tr>
      <td><a href="regisformember.html"/><input type="button" name="button9" id="button9" value="สมัครสมาชิก"></td>
    </tr>
    <tr>
      <td><a href="report.html"/><input type="button" name="button2" id="button3" value="รายงาน"></td>
    </tr>
    <tr>
      <td><a href="upload.html"/><input type="button" name="button2" id="button4" value="อัพเโหลดเอกสาร"></td>
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
