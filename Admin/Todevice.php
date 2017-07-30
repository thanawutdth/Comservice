<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/login.css" rel="stylesheet" type="text/css" />
<title>ComputerService</title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body topmargin="0">
<table width="200" border="2" align="center">
  <tbody>
    <tr>
      <th height="212" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr align="left" valign="top">
      <td height="48" align="left">
        <div align="center">
        
        
        
               
          <?
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project2");


//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
 $strSQL = "INSERT INTO device_db ";
 $strSQL .="(device_id,flname,type,date) ";
 $strSQL .="VALUES ";
 $strSQL .="('".$_POST["device_id"]."','".$_POST["flname"]."' ";
 $strSQL .=",'".$_POST["type"]."' ";
 $strSQL .=",'".$_POST["dete"]."')"; 
 
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
 $strSQL = "UPDATE device_db SET ";
 $strSQL .="device_id = '".$_POST["fixid"]."' ";
 $strSQL .=",flname = '".$_POST["flname"]."' ";
 $strSQL .=",type = '".$_POST["type"]."' ";
 $strSQL .=",date = '".$_POST["date"]."' ";
 $strSQL .="WHERE device_id = '".$_POST["hdnEditfixid"]."' ";
 
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
 $strSQL = "DELETE FROM device_db ";
 $strSQL .="WHERE device_id = '".$_GET["FixID"]."' ";
 $objQuery = mysql_query($strSQL);

 if(!$objQuery)
 {
  echo "Error Save [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}

$strSQL = "SELECT * FROM device_db";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<div id="tarang"  >  
<form  name="frm" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
      
        <table width="95%" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="29" height="25"><strong>ลำดับที่</strong></td>
          <td><strong>name</strong></td>
          
          <td><strong>type</strong></td>
          <td><strong>date</strong></td>
          </tr>
        </tbody>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <?
 if($objResult["device_id"] == $_GET["FixID"] and $_GET["Action"] == "Edit")
 {
  ?>
  <tr>
    <td><div align="center">
  <input type="text" name="fixid" size="5" value="<? echo $objResult["device_id"];?>">
  <input type="hidden" name="hdnEditfixid"  value="<? echo $objResult["device_id"];?>">
 </div></td>
    <td><input type="text" name="name"  value="<? echo $objResult["flname"];?>"></td>
    <td><input type="text" name="type"  value="<? echo $objResult["type"];?>"></td>
    <td><input type="date" name="date"  value="<? echo $objResult["date"];?>"></td>
    
    <td colspan="2" align="right">
      
      <div align="center">
        <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frm.hdnCmd.value='Update';frm.submit();">
        <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">
      </div></td>
  </tr>
  <?
 }
  else
 {
  ?>
  <tr bgcolor="#FFFFFF">
          <td width="63"><? echo $objResult["admin_id"];?></td>  
          
          <td width="63"><? echo $objResult["flname"];?></td>  
          <td width="94"><? echo $objResult["type"];?></td>
          <td width="105"><? echo $objResult["date"];?></td>
          <td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&FixID=<?=$objResult["device_id"];?>">Edit</a></td>
 <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&FixID=<?=$objResult["device_id"];?>';}">Delete</a></td>
  </tr>
  <?
 }
  ?>
<?
}
?>
  <tr>
    <td><div align="center"><input type="text" name="device_id" size="5"></div></td>
    <td><input type="text" name="flname" ></td>
    <td><input type="text" name="type" size="20"></td>
    <td ><input type="text" name="date" ></td>
    
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frm.hdnCmd.value='Add';frm.submit();">
    </div></td>
  </tr>
</table>
</form>
<?
mysql_close($objConnect);
?>       
     
   
</div></td></tr>
</table></td>
    </tr>
    <tr>
      <td height="19">&nbsp;</td>
</tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
