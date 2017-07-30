<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<meta charset="utf-8">
<link href="css/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(../Image/white-wallpaper-18.jpg);
}

#tarang {    
    border: 1px solid #ddd;
    text-align: center;
	width:100%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 0px;
}
#search{
	width: 100%;
 	height:35px;
	font-size:15px;
    
	}
#button{
	background:#84C119;
	font-size:100%;
width:100%;
height:35px;
 
	}
</style>

</head>
<body>
<?
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project2");

//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
 $strSQL = "INSERT INTO fix_db ";
 $strSQL .="(fix_id,name,date,Building,type,detail,phone,status,infer,technician) ";
 $strSQL .="VALUES ";
 $strSQL .="('".$_POST["txtAddfix_id"]."','".$_POST["txtAddName"]."' ";
 $strSQL .=",'".$_POST["txtAddDate"]."' ";
 $strSQL .=",'".$_POST["txtAddPosition"]."','".$_POST["type"]."' ";
 $strSQL .=",'".$_POST["txtAddDetail"]."','".$_POST["txtAddPhone"]."' ";
 $strSQL .=",'".$_POST["txtAddStatus"]."','".$_POST["txtAddInfer"]."' ";
 $strSQL .=",'".$_POST["txtAddStatus"]."')"; 
 
 $objQuery = mysql_query($strSQL);
 if(!$objQuery)
 {
  echo "Error Save [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}

//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
 $strSQL = "UPDATE fix_db SET ";
 $strSQL .="fix_id = '".$_POST["fixid"]."' ";
 $strSQL .=",name = '".$_POST["name"]."' ";
 $strSQL .=",date = '".$_POST["date"]."' ";
 $strSQL .=",Building = '".$_POST["Building"]."' ";
 $strSQL .=",type = '".$_POST["type"]."' ";
 $strSQL .=",detail = '".$_POST["detail"]."' ";
 $strSQL .=",phone = '".$_POST["phone"]."' ";
 $strSQL .=",status = '".$_POST["status"]."' ";
 $strSQL .=",infer = '".$_POST["infer"]."' ";
  $strSQL .=",technician = '".$_POST["technician"]."' ";
 $strSQL .="WHERE fix_id = '".$_POST["hdnEditfixid"]."' ";
 
 $objQuery = mysql_query($strSQL);
 if(!$objQuery)
 {
  echo "Error Update [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}

//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
 $strSQL = "DELETE FROM fix_db ";
 $strSQL .="WHERE fix_id = '".$_GET["FixID"]."' ";
 $objQuery = mysql_query($strSQL);
 if(!$objQuery)
 {
  echo "Error Delete [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}

$strSQL = "SELECT * FROM fix_db";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>


<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<div id="tarang" >        
        <table width="95%" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="29" height="25"><strong>ลำดับที่</strong></td>
          <td><strong>ชื่อ</strong></td>
          
          <td><strong>วันที่</strong></td>
          <td><strong>หน่วยงาน</strong></td>
          <td><strong>ชนิดอุปกรณ์</strong></td>
          <td><strong>รายละเอียด</strong></td>
          <td><strong>เบอร์โทรศัพท์</strong></td>
          <td><strong>สถานะ</strong></td>
          <td><strong>ปัญหาที่พบ</strong></td>
          <td><strong>ผู้ดำเนินการ</strong></td>
          <td><table width="31" border="2">
            <tbody>
                <tr style="font-size: 16px">
              
                  <td width="19">Edit</td>
                </tr>
              </tbody>
          </table></td>
        </tr>
        </tbody>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <?
 if($objResult["fix_id"] == $_GET["FixID"] and $_GET["Action"] == "Edit")
 {
  ?>
  <tr>
    <td><div align="center">
  <input type="text" name="fixid" size="5" value="<?=$objResult["fix_id"];?>">
  <input type="hidden" name="hdnEditfixid"  value="<?=$objResult["fix_id"];?>">
 </div></td>
    <td><input type="text" name="name"  value="<?=$objResult["name"];?>"></td>
    <td><input type="text" name="date"  value="<?=$objResult["date"];?>"></td>
    <td><div align="center"><input type="text" name="Building" size="2" value="<?=$objResult["Building"];?>"></div></td>
    <td align="right"><input type="text" name="type" value="<?=$objResult["type"];?>"></td>
    <td align="right"><input type="text" name="detail" size="5" value="<?=$objResult["detail"];?>"></td>
     <td align="right"><input type="text" name="phone" size="5" value="<?=$objResult["phone"];?>"></td>
      <td align="right"><input type="text" name="status" size="5" value="<?=$objResult["status"];?>"></td>
       <td align="right"><input type="text" name="infer" size="5" value="<?=$objResult["infer"];?>"></td>
        <td align="right"><input type="text" name="technician" size="5" value="<?=$objResult["technician"];?>"></td>
    <td colspan="2" align="right">
    
    <div align="center">
      <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">
   <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">
    </div></td>
  </tr>
  <?
 }
  else
 {
  ?>
  <tr bgcolor="#FFFFFF">
          <td width="63"><? echo $objResult["fix_id"];?></td>  
          
          <td width="63"><? echo $objResult["name"];?></td>  
          <td width="94"><? echo $objResult["date"];?></td>
          <td width="105"><? echo $objResult["Building"];?></td>
          <td width="120"><? echo $objResult["type"];?></td>
          <td width="130"><? echo $objResult["detail"];?></td>
          <td width="89"><? echo $objResult["phone"];?></td>
      
          <td width="79" ><select>
            <option>รอดำเนิน</option>
            <option>เสร็จสิ้น</option>
            <option>ไม่ได้</option>
          </select></td>
           <td width="120"></td>
          <td width="116"></td>
          
          
    <td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&FixID=<?=$objResult["fix_id"];?>">Edit</a></td>
 <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&FixID=<?=$objResult["fix_id"];?>';}">Delete</a></td>
  </tr>
  <?
 }
  ?>
<?
}
?>
  <tr>
    <td><div align="center"><input type="text" name="Addfix_id" size="5"></div></td>
    <td><input type="text" name="txtAddName" ></td>
    <td><input type="text" name="txtAddDate" size="20"></td>
    <td><div align="center"><select name="txtAddPosition"><option>--เลือกหน่วยงาน--</option>
                   <option>อบจ.มค.</option>
                   <option>โรงเรียนเมืองเตาวิทยาคม</option>
                   <option>โรงเรียนท่าขอนยางพิทยาคม</option>
                   <option>โรงเรียนหนองบัวปิยนิมิตร</option>
                   <option>โรงเรียนมะค่าพิทยาคม</option>
                   <option>โรงเรียนหนองเหล็กศึกษา</option>
                   <option>โรงเรียนนาสีนวนพิทยาสรรค์</option>
                   <option>โรงเรียนหนองโพธิ์วิทยาคม</option>
                   <option>โรงเรียนนาข่าวิทยาคม</option>
                   <option>โรงเรียนมัธยมดงยาง</option>
                   <option>โรงเรียนเกิ้งวิทยานุกูล</option>
                   <option>โรงเรียนขามป้อมพิทยาคม</option>
                   <option>โรงเรียนเลิงแฝกประชาบำรุง</option>
                   <option>โรงเรียนโคกก่อพิทยาคม</option>
                   <option>โรงเรียนดอนเงินพิทยาคาร</option>
                   <option>โรงเรียนหนองโกวิชาประสิทธิ์</option>
                   <option>โรงเรียนเสือโก้กวิทยาสรรค์</option>
                   <option>โรงเรียนเวียงสะอาดพิทยาคม</option>
                   <option>โรงเรียนงัวบาวิทยาคม</option>
                   <option>โรงเรียนศรีสุขพิทยาคม</option>
                   <option>โรงเรียนหัวเรือพิทยาคม</option></select></div></td>
    <td align="right">  <select name="type" id="select">
                     <option>เลือกชนิดอุปกรณ์</option>
                     <option>เครื่องปริ้น</option>
                     <option>หน้าจอ</option>
                     <option>เมาส์</option>
                     <option>คีย์บอร์ด</option>
                   </select></td>
    <td align="right"><input type="text" name="txtAddDetail" ></td>
    <td align="right"><input type="text" name="txtAddPhone" ></td>
    <td align="right"><select name="txtAddStatus">
      <option>รอดำเนิน</option>
      <option>เสร็จสิ้น</option>
      <option>ไม่ได้</option>
    </select>
   
    <td align="right"><input type="text" name="txtAddInfer" ></td>
     <td align="right"><input type="text" name="txtAddTechnician" ></td>
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">
    </div></td>
  </tr>
</table>
</form>
<?
mysql_close($objConnect);
?>
</body>
</html>