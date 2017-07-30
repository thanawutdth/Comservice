<? include('meta_technic.php');?>

    <tr valign="top">
      <td width="248">
	  <? include("sidebar_technic.php");?>
      </td>

    <td width="896" align="center">
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
			$name = $result[name];
			$message = $result[message];
			$email = $result[email];
			$date_q = $result[date_q];
			$count_q = $result[count_q];
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
  <td width="2" align="center" valign="top"><p>&nbsp;</p></td>
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
