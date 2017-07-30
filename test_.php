upload.htm 

<HTML> 
<HEAD><TITLE> PHOTO GALLERY</TITLE> 
<meta charset="utf-8"></HEAD> 
<BODY> 
<h2>ADMIN : PHOTO GALLERY</h2> 
<FORM METHOD=POST ACTION="insert.php" ENCTYPE="multipart/form-data"> 
<TABLE> 
<TR> 
<TD><div align="right">รูปภาพ :</div></TD> 
<TD><INPUT TYPE="file" NAME="photo"></TD> 
</TR> 
<TR> 
<TD valign="top"><div align="right">คำอธิบายรูปภาพ: </div></TD> 
<TD><TEXTAREA NAME="detail" ROWS="4" COLS="35"></TEXTAREA></TD> 
</TR> 
<TR> 
<TD>&nbsp;</TD> 
<TD><input name="submit" type="submit" value="Submit"> 
<input name="reset" type="reset" value="Reset"> 
</TD> 
</TR> 
</TABLE> 
</FORM> 
<? 
$no=0; 
include "connect.php"; 
$sql="select * from fix_db"; 
$result=mysql_db_query($dbname,$sql); 
$num=mysql_num_rows($result); 
if($num>0) { 

echo " 

<TABLE BORDER=1 > 
<TR bgcolor=#EEEEEE> 
<TD><strong>ลำดับ</strong></TD> 
<TD><strong>ชื่อไฟล์รูปภาพ</strong></TD> 
<TD><strong>รายละเอียด</strong></TD> 
<TD><strong>ลบ</strong></TD> 
</TR>"; 

while ($r=mysql_fetch_array($result)) { 
$id_photo=$r[id_photo]; 
$name_photo=$r[name_photo]; 
$detail_photo=$r[detail_photo]; 
$no++; 

echo " 
<TR> 
<TD><center>$no</center></TD> 
<TD>$name_photo</TD> 
<TD>$detail_photo</TD> 
<TD><a href='delete.php?id_del=$id_photo&name_del=$name_photo' 
onclick=\"return confirm('คุณแน่ใจที่จะลบรูป $name_photo ออกจากระบบ?')\"><img src=\"delete.jpg\" border=0></a> 
</TD> </TR>"; 
} // end while 
} // end if 
?> 
</TABLE> 
</BODY> 
</HTML> 
----------------- 
insert.php 

<? 
$photo=$_FILES['photo']['tmp_name']; 
$photo_name=$_FILES['photo']['name']; 
$photo_size=$_FILES['photo']['size']; 
$photo_type=$_FILES['photo']['type']; 

$detail=$_POST['detail']; 

if (!$photo) {	
echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพได้ครับ</h3>"; 
} else { 
include "connect.php"; 
$array_last=explode(".",$photo_name); 
$c=count($array_last)-1; 
$lastname=strtolower($array_last[$c]) ; 
if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {
copy($photo,"images/".$photo_name); 
$sql="insert into tb_photo values('','$photo_name','$detail')"; 
mysql_db_query($dbname,$sql); 
echo "<a href='admin.php'><h3>Upload รูปภาพ เรียบร้อยแล้วครับ</h3></a>"; 

} else{ 
echo "<h3>ERROR : เฉพาะรูปภาพนามสกุล *.gif , *.jpg , *.jpeg เท่านั้น</h3>"; 
} 
unlink($photo); 
mysql_close(); 
} 
?> 

พอจะเป็นแนวทางนะครับ ถ้าไม่เข้าใจ e-mail มาคุยกับผมได้ครับ banhdit@tu.ac.th