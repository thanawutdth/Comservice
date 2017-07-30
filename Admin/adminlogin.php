<? session_start();?>
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


<body topmargin="0">
<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr>
      <td width="248">
        <div id="login">
 
    <a href="/project2/Admin/adminlogin.php"><h1>ADMIN</h1></a> 

  <a href="/project2/Admin/adminlogin.php"> <input  type="button" name="button1" id="button1" value="เพิ่มแอด+ช่าง"  ></a>
 <a href="/project2/Admin/Admin_Technic.php"> <input  type="button" name="button1" id="button1" value="รายชื่อแอด+ช่าง"  ></a>
  <a href="/project2/Admin/memberlist.php"><input type="button" name="button5" id="button5" value="รายการสมาชิก"></a>
  <a href="/project2/Admin/list_repair.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
  <a href="/project2/Admin/Todevice.php"><input type="button" name="button7" id="button7" value="รายการเบิก-คืน"></a>
  <a href="/project2/Admin/Webboard.php"><input type="button" name="button8" id="button8" value="กระทู้"></a>
  <a href="/project2/Admin/regisformember.php"><input type="button" name="button9" id="button9" value="สมัครสมาชิก"></a>
  <a href="/project2/Admin/report.php"><input type="button" name="button2" id="button3" value="รายงาน"></a>
  <a href="/project2/Admin/Evalution.php"><input type="button" name="button2" id="button4" value="ประเมิน"></a>
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
                  <input type="text" name="username" id="username"  ></th>
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
                <td>&nbsp;</td>
                <td><p>
                  <input type="submit" name="button" id="button" value="Submit">
                </p>
                  &nbsp;
                  <p>
                    <input type="reset" name="reset" id="reset" value="Reset">
                  </p></td>
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
