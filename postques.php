<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?
include("connect.php");
	$sql = "INSERT INTO webboard_quiz order by id_question desc";
	$dbquery = mysql_db_query($dbname,$sql);
	$num_row = mysql_fetch_array($dbquery);
	$i=0;
		while($i < $num_row)
		{
			$result = mysql_fetch_array($dbquery);
			$id_question = $result[id_question];
			$title = $result[title];
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
			print "<br><div align = center><b>กระทู้ของคุณ$name ถูกตั้งเรียบร้อยแล้ว</b> </div></br>";
			print "<div align = center><a href =\"Webboard\Webboard.php\">กลับไปหน้ากระทู้หลัก</a></div>";
 ?>
<?php /*
include("connect.php");
	$date_q=date("d/m/y/");
	$dbquery = mysql_db_query($dbname,$sql);
	$sql = "select * from webboard_quiz order by id_question desc";
	$num_row = mysql_num_rows($dbquery);
	$i=0;
		while($i < $num_row)
		{
			$result = mysql_fetch_array($dbquery);
			$id_question = $result[id_question];
			$title = $result[title];
			$name = $result[name];
			$message = $result[message];
			$email = $result[email];
			$date_q = $result[date_q];
			$count_q = $result[count_q];print "<tr bgcolor=#FFFFFF>";
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
	echo $sql;
	
	//$sql1 ="INSERT INTO `project2`.`admin_id` (`title` ,`name` ,`$message` ,`$email` ,`date_q` )
//VALUES('$title','$name','$message','$email','$date_q');";
			
	


mysql_close();

print "<br><div align = center><b>กระทู้ของคุณ$name ถูกตั้งเรียบร้อยแล้ว</b> </div></br>";
print "<div align = center><a href =\"Webboard\Webboard.php\">กลับไปหน้ากระทู้หลัก</a></div>";

*/

?>











<body>
</body>
</html>