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
<link href="../css/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(../Image/white-wallpaper-18.jpg);
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
    <th height="189" colspan="3" scope="col"><img src="../Image/header2.jpg" width="999" height="187" alt=""/></th>
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
     <a href="../Repairing/repairing.html"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
     <a href="../Webboard/webboard.html"><input type="button" name="button7" id="button7" value="กระทู้-ถามตอบ">
                </a><a href="/project2/Member/stat.php">
                <input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม">
                </a>
          <input onClick="myFunction()" type="button" name="button9" id="button9" value="ดาวน์โหลด">
          <a href="/project2/Member/contact.php"> <input type="button" name="button2" id="button2" value="ติดต่อเรา"></a>
        </div>
        </p>
       
        
       
      </form>
    </div></td>
    <td width="743" align="left"><table width="658" height="469" border="0">
        <tbody>
          <tr>
            <td width="374" colspan="4" align="center" valign="top"><table width="464" border="0">
        <tbody>
          <tr>
            <td width="91" height="173">&nbsp;</td>
            <td width="203" align="center" valign="top"><img src="/project2/Image/header/logo อบจ.jpg" width="204" height="187" alt=""/></td>
            <td width="90">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong>หัวหน้าประจำฝ่ายไอที</strong></span></td>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong>นาย................... โทร..................</strong></span></td>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong><a href="www.google.com"><img src="/project2/Image/icon left bar/if_email_mail_envelope_send_message_1011336.png" width="39" height="34" alt=""/></a></strong></span></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong>เจ้าหน้าที่ คนที่ 1</strong></span></td>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong>นาย................... โทร..................</strong></span></td>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong><a href="www.google.com"><img src="/project2/Image/icon left bar/if_email_mail_envelope_send_message_1011336.png" width="39" height="34" alt=""/></a></strong></span></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong>เจ้าหน้าที่ คนที่ 2</strong></span></td>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong>นาย................... โทร..................</strong></span></td>
            <td align="center" bgcolor="#E1DBDB" style="font-size: 16px"><span style="font-size: 14px"><strong><a href="www.google.com"><img src="/project2/Image/icon left bar/if_email_mail_envelope_send_message_1011336.png" width="39" height="34" alt=""/></a></strong></span></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong>เจ้าหน้าที่ คนที่ 3</strong></span></td>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong>นาย................... โทร.................</strong></span></td>
            <td align="center" bgcolor="#E7E7E7" style="font-size: 16px"><span style="font-size: 14px"><strong><a href="www.google.com"><img src="/project2/Image/icon left bar/if_email_mail_envelope_send_message_1011336.png" width="39" height="34" alt=""/></a></strong></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="280" border="0">
              <tbody>
                <tr>
                  <td width="108"><a href="www.facebook.com"><img src="/project2/Image/icon left bar/Facebook.png" width="48" height="48" alt=""/></a></td>
                  <td width="95"><a href="www.google.com"><img src="/project2/Image/icon left bar/Line.png" width="48" height="48" alt=""/></a></td>
                  <td width="50"><img src="/project2/Image/icon left bar/Google.png" width="50" height="48" alt=""/></td>
                </tr>
              </tbody>
            </table></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
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
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
