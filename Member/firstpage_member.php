<? session_start(); ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php
	session_start();
	
	mysql_connect("localhost","root","1234");
	mysql_select_db("project2");
	$strSQL = "SELECT * FROM viewdatabase  ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<body topmargin="0">
<table width="200" height="832" border="0" align="center">
  <tbody>
    <tr>
      <th height="212" colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>

    <tr align="left" valign="top">
      <td height="253" align="left"><div id="login">
 


 <a href="/project2/Member/firstpage_member.php"><h1>USER</h1> </a>  
 

      <a href="/project2/Member/Edit_member.php"> <input type="button" name="button2" id="button2" value="แก้ไขข้อมูลส่วนตัว" ></a>
      <a href="/project2/Member/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์" ></a>
      <a href="/project2/Member/listrepair.php"><input type="button" name="button5" id="button5" value="รายการแจ้งซ่อม"></a>
      <a href="/project2/Member/Webboard.php"><input type="button" name="button6" id="button6" value="กระทู้ ถาม-ตอบ"> </a>
      <a href="/project2/Member/stat.php"><input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม"></a>
	  <a href="/project2/Member/download.php"><input type="button" name="button9" id="button9" value="ดาวน์โหลด"></a>
      <a href="/project2/Member/Evaluation.php"><input type="button" name="button3" id="button3" value="ประเมิน"></a>
      <a href="/project2/Member/contact.php"><input type="button" name="button4" id="button4" value="ติดต่อเรา"> </a>
        
      </div></td>
      <td width="655" align="center" valign="top" bgcolor="#FFFFFF"><table width="658" height="469" border="0">
        <tbody>
          <tr>
            <td height="75" colspan="4" align="center" valign="top"><a href=""><h3>ร่วมพิธีเปิดการฝึกภาคปกตินักศึกษาวิชาทหารสังกัดองค์การบริหารส่วนจังหวัดมหาสารคาม หน่วยฝึกนักศึกษาวิชาทหาร มณฑลทหารบกที่ 26 ประจำปีการศึกษา 2560 </h3></a></td>
            </tr>
          <tr>
            <td width="84" height="161">&nbsp;</td>
            <td colspan="2"><img src="/project2/Image/ร่วมงาน.jpg" width="472" height="244" alt=""/></td>
            <td width="104">&nbsp;</td>
          </tr>
          <tr>
            <td height="24">&nbsp;</td>
            <td width="363">&nbsp;</td>
            <td width="101"><input type="button" name="button" id="button" value="อ่านรายละเอียด"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center" valign="top"><a href="">
              <h3>ดร.คมคายอุดรพิมพ์นายกองค์การบริหารส่วนจังหวัดมหาสารคามพร้อมด้วยสมาชิกสภาองค์การบริหารส่วนจังหวัดมหาสารคาม และผู้บริหารองค์การบริหารส่วนจังหวัดมหาสารคาม ร่วมบันทึกเทปถวายพระพร </h3></a></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><img src="/project2/Image/ดพพ.jpg" width="472" height="244" alt=""/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="button" name="button7" id="button7" value="อ่านรายละเอียด"></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    
    <div class="banner">
        <tr>
          
        </tr>
    </div>
    
    
    <tr>
      <td height="19" colspan="2" align="center">
<a  href="#" rel="nofollow" title="กลับขึ้นไปด้านบนของหน้าเว็บ" ><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
