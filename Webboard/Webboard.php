
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
<table width="841" border="2" align="center">
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
    
    <td width="743" align="center">
  <?
  
   print"<table width=456 height=59 border=2>";
   print"<tr>";
   print"<td width=703>";
   print"  <table width=532 align=center>";
      print"<tr bgcolor=#6AC2EF>";
         print"<td>รหัสกระทู้</td>";
          print" <td>หัวข้อกระทู้</td>";
          print" <td>ผู้ตั้งคำถาม</td>";
          print" <td>วันที่ตั้งคำถาม</td>";
       print" </tr>";
        
include("connect.php");
	$sql = "select * from webboard_quiz order by id_question desc";
	$dbquery = mysql_db_query($dbname,$sql);
	$num_row = mysql_num_rows($dbquery);
	$i=0;
		while($i < $num_row)
		{
			$result = mysql_fetch_array($dbquery);
			$id_question = $result["id_question"];
			$title = $result["title"];
			$name = $result["name"];
			$message = $result["message"];
			$email = $result["email"];
			$date_q = $result["date_q"];
			$count_q = $result["count_q"];
			print "<tr bgcolor=#FFFFFF>";
			print"<td>".$id_question."</td>";
			print"<td><a href=\"webboard_ans.php?id_question=$id_question\" target=\"$id_question\">$title</a></td>";
			print"<td>".$name."</td>";
			print"<td>".$date_q."</td>";
				print"</tr>";	
			$i++;
			}
			
			print"</table>";
			mysql_close();
		print"</td>";
		print"</tr>";
		print"</table>";

 ?>
<form name="form1" method="post" action="/project2/postques.php">
    <table width="477" height="313" border="2">
      <tbody>
        <tr>
          <td colspan="2" align="center">ตั้งกระทู้ใหม่</td>
          </tr>
        <tr>
          <td width="52" height="21">หัวข้อกระทู้:</td>
          <td width="331"><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
          <td>รายละเอียด:</td>
          <td><textarea name="message" id="message" wrap="virtual"></textarea></td>
        </tr>
        <tr>
          <td>ชื่อผู้โพสต์:</td>
          <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
          <td>อีเมล์:</td>
          <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="200" border="2">
            <tbody>
              <tr>
                <td width="100"><input type="submit" name="submit" id="submit" value="ตั้งคำถาม"></td>
                <td width="82"><input type="button" name="button3" id="button3" value="ยกเลิก"></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></form>
    
    
    
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
