<?
session_start();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ComputerService</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(Image/white-wallpaper-18.jpg);
}
</style>



<body topmargin="0" >
<script language="javascript">
function fncSubmit()
{
	if(document.form1.txtUsername.value == "")
	{
		alert('กรุณากรอก "ชื่อผู้ใช้งาน"');
		document.form1.txtUsername.focus();
		return false;
	}	
	if(document.form1.txtPassword.value == "")
	{
		alert('กรุณากรอก "รหัสผ่าน"');
		document.form1.txtPassword.focus();		
		return false;
	}	
	document.form1.submit();
}
</script>
<div id="aaa">
<table width="841" border="0" align="center">
<tbody>
  <tbody>
  <tr align="left" valign="top">
    <th height="189" colspan="3" scope="col"><img src="Image/header2.jpg" width="999" height="187" alt=""/></th>
  </tr>
  <tr align="left" valign="top">
    <td width="248" align="center"><div id="login">
      <h1>LOG IN</h1>
      <form  method="post" action="/project2/checklogin.php" name="form1" onSubmit="JavaScript:return fncSubmit();" >
        
          <input  type="Text" placeholder="username" id="txtUsername" name="txtUsername"/>
          <input type="password" placeholder="Password"  id="txtPassword" name="txtPassword"/>
          <input type="submit" value="Submit"  />        
        <p>&nbsp;
        <div id="border">
         <a href=""> <input onClick="myFunction()" type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์"  ></a>
         <script>
				function myFunction() {
					alert("สำหรับสมาชิกเท่านั้น กรุณา login ");
				}
			</script>
     <a href="/project2/Listrepairing/list_repair.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
     <a href="/project2/Webboard/Webboard.php"><input type="button" name="button7" id="button7" value="กระทู้-ถามตอบ">
                </a><a href="/project2/Member/stat.php">
                <input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม">
                </a>
          <input onClick="myFunction()" type="button" name="button9" id="button9" value="ดาวน์โหลด">
          <a href="/project2/Member/contact_indext.php"> <input type="button" name="button2" id="button2" value="ติดต่อเรา"></a>
        </div>
        </p>
       
        
       
      </form>
    </div></td>
    <td width="743" align="left"><table width="658" height="469" border="0">
        <tbody>
          <tr>
            <td height="75" colspan="4" align="center" valign="top"><a href=""><h3>ร่วมพิธีเปิดการฝึกภาคปกตินักศึกษาวิชาทหารสังกัดองค์การบริหารส่วนจังหวัดมหาสารคาม หน่วยฝึกนักศึกษาวิชาทหาร มณฑลทหารบกที่ 26 ประจำปีการศึกษา 2560 </h3></a></td>
            </tr>
          <tr>
            <td width="85" height="161">&nbsp;</td>
            <td colspan="2"><img src="/project2/Image/ร่วมงาน.jpg" width="472" height="244" alt=""/></td>
            <td width="102">&nbsp;</td>
          </tr>
          <tr>
            <td height="24">&nbsp;</td>
            <td width="374">&nbsp;</td>
            <td width="110"><input type="button" name="button" id="button" value="อ่านรายละเอียด"></td>
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
      </table></td></td>
    
    
  </tr>
  <tr>
  <td width="248" align="center" valign="top">&nbsp;</td>
  <td width="743" align="center" valign="top"><p>&nbsp;</p></td>
</tr>
<div class="banner"> </div>
</table></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
