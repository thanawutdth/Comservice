<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ComputerService</title>
<link href="../css/login.css" rel="stylesheet" type="text/css" />

</head>


<body topmargin="0">
<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr>
      <td align="center" valign="top"><a href="/project2/Admin/adminlogin.php"><img src="/project2/Image/icon left bar/Back.png" width="32" height="32" alt=""/></a></td>
    </tr>
    <tr>
      
        
      <td width="657" rowspan="9" align="center" valign="top">
   
        
        
            <?
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project2");


//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
 $strSQL = "INSERT INTO admin_db ";
 $strSQL .="(admin_id,username,password,name,lastname,phone,email,position) ";
 $strSQL .="VALUES ";
 $strSQL .="('".$_POST["admin_id"]."','".$_POST["username"]."' ";
 $strSQL .=",'".$_POST["password"]."' ";
 $strSQL .=",'".$_POST["name"]."','".$_POST["lastname"]."' ";
 $strSQL .=",'".$_POST["phone"]."','".$_POST["email"]."' ";
 $strSQL .=",'".$_POST["position"]."')"; 
 
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
 $strSQL = "UPDATE admin_db SET ";
 $strSQL .="admin_id = '".$_POST["fixid"]."' ";
 $strSQL .=",username = '".$_POST["username"]."' ";
 $strSQL .=",password = '".$_POST["password"]."' ";
 $strSQL .=",name = '".$_POST["name"]."' ";
 $strSQL .=",lastname = '".$_POST["lastname"]."' ";
 $strSQL .=",phone = '".$_POST["phone"]."' ";
 $strSQL .=",email = '".$_POST["email"]."' ";
 $strSQL .=",position = '".$_POST["position"]."' ";
 $strSQL .="WHERE admin_id = '".$_POST["hdnEditfixid"]."' ";
 
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
 $strSQL = "DELETE FROM admin_db ";
 $strSQL .="WHERE admin_id = '".$_GET["FixID"]."' ";
 $objQuery = mysql_query($strSQL);

 if(!$objQuery)
 {
  echo "Error Save [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}

$strSQL = "SELECT * FROM admin_db";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
          </p>
          <p>&nbsp; </p>
        <div id="tarang"  align="center">  
  <form  name="frm" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
      
        <table width="100%" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="29" height="25"><strong>ลำดับที่</strong></td>
          <td><strong>username</strong></td>
          
          <td><strong>password</strong></td>
          <td><strong>name</strong></td>
          <td><strong>lastname</strong></td>
          <td><strong>phone</strong></td>
          <td><strong>email</strong></td>
          <td><strong>position</strong></td>
         
        </tr>
        </tbody>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <?
 if($objResult["admin_id"] == $_GET["FixID"] and $_GET["Action"] == "Edit")
 {
  ?>
  <tr>
    <td><div align="center">
  <input type="text" name="fixid" size="5" value="<? echo $objResult["admin_id"];?>">
  <input type="hidden" name="hdnEditfixid"  value="<? echo $objResult["admin_id"];?>">
 </div></td>
    <td><input type="text" name="username"  value="<? echo $objResult["username"];?>"></td>
    <td><input type="text" name="password"  value="<? echo $objResult["password"];?>"></td>
    <td><div align="center"><input type="text" name="name" size="2" value="<? echo $objResult["name"];?>"></div></td>
    <td align="right"><input type="text" name="lastname" value="<? echo $objResult["lastname"];?>"></td>
    <td align="right"><input type="text" name="phone" size="5" value="<? echo $objResult["phone"];?>"></td>
     <td align="right"><input type="text" name="email" size="5" value="<? echo $objResult["email"];?>"></td>
      <td align="right"><select name="position" >
            <option>1</option>
            <option>2</option>
            
          </select></td>
     
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
          
          <td width="63"><? echo $objResult["username"];?></td>  
          <td width="94"><? echo $objResult["password"];?></td>
          <td width="105"><? echo $objResult["name"];?></td>
          <td width="120"><? echo $objResult["lastname"];?></td>
          <td width="130"><? echo $objResult["phone"];?></td>
          <td width="89"><? echo $objResult["email"];?></td>
      	 <td width="89"><select name="position" >
            <option>1</option>
            <option>2</option>
            
          </select></td>
          
          
          
          
    <td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&FixID=<?=$objResult["admin_id"];?>">Edit</a></td>
 <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&FixID=<?=$objResult["admin_id"];?>';}">Delete</a></td>
  </tr>
  <?
 }
  ?>
<?
}
?>
  <tr>
    <td><div align="center"><input type="text" name="admin_id" size="5"></div></td>
    <td><input type="text" name="username" ></td>
    <td><input type="text" name="password" size="20"></td>
    <td align="right"><input type="text" name="name" ></td>
    <td align="right"><input type="text" name="lastname" ></td>
    
    <td align="right"><input type="text" name="phone" ></td>
     <td align="right"><input type="text" name="email" ></td>
       <td align="center"><select name="position" >
         <option>1</option>
         <option>2</option>
       
       </select></td>
     
     
     
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
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
