
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


<table width="841" border="2" align="center">
<tbody>
  <tbody>
  <tr align="left" valign="top">
    <th height="189" colspan="3" scope="col"><img src="../Image/header2.jpg" width="999" height="187" alt=""/></th>
  </tr>
  <tr align="left" valign="top">
    <td width="248" align="center"><div id="login">
<a href="/project2/Member/firstpage_member.php"><h1>Computer Service</h1> </a>  
 

      <a href="/project2/Member/Edit_member.php"> <input type="button" name="button2" id="button2" value="แก้ไขข้อมูลส่วนตัว" ></a>
      <a href="/project2/Member/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์" ></a>
      <a href="/project2/Member/listrepair.php"><input type="button" name="button5" id="button5" value="รายการแจ้งซ่อม"></a>
      <a href="/project2/Member/Webboard.php"><input type="button" name="button6" id="button6" value="กระทู้ ถาม-ตอบ"> </a>
      <a href="/project2/Member/stat.php"><input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม"></a>
	  <a href="/project2/Member/download.php"><input type="button" name="button9" id="button9" value="ดาวน์โหลด"></a>
      <a href="/project2/Member/Evaluation.php"><input type="button" name="button3" id="button3" value="ประเมิน"></a>
      <a href="/project2/Member/contact.php"><input type="button" name="button4" id="button4" value="ติดต่อเรา"> </a>
        
        </div></td>
  
    <td width="743" align="center">
     <div align="center">
      <p>
      <?
      include("connect.php");
	  	$sql = "select * from webboard_quiz where id_question=$id_question";
		$dbquery = mysql_db_query($dbname,$sql);
		$result = mysql_fetch_array($dbquery);
	
			$id_question = $result["id_question"];
			$title = $result["title"];
			$name = $result["name"];
			$message = $result["message"];
			$email = $result["email"];
			$date_q = $result["date_q"];
	  
	  	  print"<table width=456 height=59 border=2>";
		   print"<tr>";
		   print"<td width=703>";
		   print"  <table width=532 align=center>";
     		 print"<tr bgcolor=#6AC2EF>";
      	   print"<td>หัวข้อกระทู้</td>";
          print" <td>".$title."<br></td>";
            print"<td>รายละเอียด</td>";
          print" <td>".$message."</td>";
		     print"<td>ผู้ตั้งกระทู้</td>";
          print" <td>".$name."</td>";
      	 print" </tr>";
	  print" </table>";
	  print" </td>";
	  print" </tr>";
	  print" </table>";
	  
	  	$sql = "select * from webboard_ans where id_question = $id_question order by id_ans";
		$dbquery = mysql_db_query($dbname,$sql);
		$num_row = mysql_num_rows($dbquery);
		if($num_row=="")
		{
			print"ยังไม่มีผู้แสดงความคิดเห็น"	;
		}
		$i=0;
		while($i<$num_row)
		{
			$result = mysql_fetch_array($dbquery);
			$id_ans = $result[id_ans];
			$id_question = $result[id_question];
			$name = $result[name];
			$message = $result[message];
			$email = $result[email];
			$date_a = $result[date_a];
			$i++;
			
			print"<br>";
			print"<table width=532 border=1 align=center cellpadding=1 cellspacing=1 >";
			print"<tr>";
			print"<td width=703>";
			print"<tr bgcolor=#FFFFFF><div align=center><b>ความคิดเห็นที่ $n</b></div></tr>";
			print"<tr bgcolor=#CCCCCC>";
			print"<td width=97><b>รายละเอียด</b></td>";
			print"<td width=417>".$message."</td>";
			print"</tr>";
			print"<tr bgcolor=#CCCCCC>";
			print"<td width=97><b>จากคุณ</b></td>";
			print"<td width=417>".$name."</td>";
			print"</tr>";
			print"</table>";
			print"</td>";
			print"</tr>";
			print"</table>";
			$i++;
		}
		mysql_close();
			 
      ?>
     </p></div>
    <form name="form1" method="post" action="/project2/Webboard/reply.php">
    <table width="477" height="313" border="2">
      <tbody>
        <tr>
          <td colspan="2" align="center">แสดงความคิดเห็น</td>
          </tr>
        <tr>
          <td width="52" height="21">ชื่อผู้ตอบ :</td>
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
                <td width="100"><input type="button" name="button" id="button" value="ตั้งคำถาม"></td>
                <td width="82"><input type="button" name="button3" id="button3" value="ยกเลิก"></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table>
  </form>
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
