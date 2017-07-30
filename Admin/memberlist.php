
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
      <th colspan="2" scope="col"><img src="../Image/header2.jpg" width="100%" height="212" alt=""/></th>
    </tr>
    <tr>
      <td>      
      <td width="657" rowspan="11" align="left" valign="top"><div class="tarang" id="">
        <a href="/project2/Admin/adminlogin.php"><p><img src="/project2/Image/icon left bar/Back.png" width="32" height="32" alt=""/></p></a>
        <p>
          
		  
		  <?php

 		$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
		$objDB = mysql_select_db("project2");
  
	//*** Add Condition ***//
	if($_POST["hdnCmd"] == "Add")
	{
		$strSQL = "INSERT INTO member_db ";
		$strSQL .="(member_id,username,password,name,lastname,phone,email,address,sector) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$_POST["member_id"]."','".$_POST["username"]."','".$_POST["password"]."' ";
		$strSQL .=",'".$_POST["name"]."' ";
		$strSQL .=",'".$_POST["lastname"]."','".$_POST["phone"]."' ";
		$strSQL .=",'".$_POST["email"]."' ";
		$strSQL .=",'".$_POST["address"]."' ";
		$strSQL .=",'".$_POST["sector"]."') ";
		
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
 $strSQL = "UPDATE member_id SET ";
 $strSQL .="member_id= '".$_POST["member"]."' ";
 $strSQL .=",username = '".$_POST["username"]."' ";
 $strSQL .=",password = '".$_POST["password"]."' ";
 $strSQL .=",name = '".$_POST["name"]."' ";
 $strSQL .=",lastname = '".$_POST["lastname"]."' ";
 $strSQL .=",phone = '".$_POST["phone"]."' ";
 $strSQL .=",email = '".$_POST["email"]."' ";
 $strSQL .=",address = '".$_POST["address"]."' ";
 $strSQL .=",sector = '".$_POST["sector"]."' ";
 $strSQL .="WHERE member_id = '".$_POST["hdnmember"]."' ";
		
		$objQuery = mysql_query($strSQL);
 if(!$objQuery)
 {
  echo "Error Save [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}
	

	//*** Delete Condition ***//
	if($_GET["Action"] == "Del")
	{
		$strSQL = "DELETE FROM member_db ";
		$strSQL .="WHERE member_id = '".$_GET["MemID"]."' ";
	
	$objQuery = mysql_query($strSQL);
 if(!$objQuery)
 {
  echo "Error Save [".mysql_error()."]";
 }
 //header("location:$_SERVER[PHP_SELF]");
 //exit();
}
	$strSQL = "SELECT * FROM member_db";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
        </p>
        <div id="tarang">
          <form name="frmMain" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
            <input type="hidden" name="hdnCmd" value="">
            <table width="891" border="1">
              <tr>
                <th width="75">member_id</th>
                <th width="75"> <div align="center">username </div></th>
                <th width="100"> <div align="center">password</div></th>
                <th width="100"> <div align="center">name</div></th>
                <th width="58"> <div align="center">lastname</div></th>
                <th width="39"> <div align="center">phone</div></th>
                <th width="89">email</th>
                <th width="86">address</th>
                <th width="84"> <div align="center">position</div></th>
                <th width="42"> <div align="center">Edit </div></th>
                <th width="73"> <div align="center">Delete </div></th>
              </tr>
              <?
while($objResult = mysql_fetch_array($objQuery))
{
?>
              
              <?php
	if($objResult["member_id"] == $_GET["MemID"] and $_GET["Action"] == "Edit")
	{
  ?>
              <tr>
                <td><div align="center">
                  <input type="text" name="member" size="5" value="<?php echo $objResult["member_id"];?>">						     	     <input type="hidden" name="hdnmember" size="5" value="<?php echo $objResult["member_id"];?>">
                </div></td>
                <td>
                  <input type="text" name="username" size="5" value="<?php echo $objResult["username"];?>">
                </td>
                <td><input type="text" name="password" size="20" value="<?php echo $objResult["password"];?>"></td>
                <td><input type="text" name="name" size="20" value="<?php echo $objResult["name"];?>"></td>
                <td><div align="center"><input type="text" name="lastname" size="2" value="<?php echo $objResult["lastname"];?>"></div></td>
                <td align="right"><input type="text" name="phone" size="5" value="<?php echo $objResult["phone"];?>"></td>
                <td align="right"><input type="text" name="email" size="5" value="<?php echo $objResult["email"];?>"></td>
                <td align="right"><input type="text" name="address" size="5" value="<?php echo $objResult["address"];?>"></td>
                <td align="right"><input type="text" name="sector" size="5" value="<?php echo $objResult["sector"];?>"></td>
                <td colspan="2" align="right"><div align="center">
                  
                  <div align="center">
                    <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">
                    <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">
                    
                    
                </div></td>
              </tr>
              <?php
	}
  else
	{
  ?>
              <tr>
                <td><div align="center"><?php echo $objResult["member_id"];?></td>
                <td><div align="center"><?php echo $objResult["username"];?></div></td>
                <td><?php echo $objResult["password"];?></td>
                <td><?php echo $objResult["name"];?></td>
                <td><div align="center"><?php echo $objResult["lastname"];?></div></td>
                <td align="right"><?php echo $objResult["phone"];?></td>
                <td align="right"><?php echo $objResult["email"];?></td>
                <td align="right"><?php echo $objResult["address"];?></td>
                <td align="right"><?php echo $objResult["sector"];?></td>
                
                <<td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&MemID=<?=$objResult["member_id"];?>">Edit</a></td>
                <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&MemID=<?=$objResult["member_id"];?>';}">Delete</a></td>
              </tr>
              <?php
	}
  ?>
              <?php
}
?>
              <tr>
                <td><div align="center"><input type="text" name="member_id" size="5"></div></td>
                <td><input type="text" name="username" size="5"></td>
                <td><input type="text" name="password" size="20"></td>
                <td><input type="text" name="name" size="20"></td>
                <td><div align="center"><input type="text" name="lastname" size="2"></div></td>
                <td align="right"><input type="text" name="phone" size="5"></td>
                <td align="right"><input type="text" name="email" size="5"></td>
                <td align="right"><input type="text" name="address" size="5"></td>
                <td align="right"><input type="text" name="sector" size="5"></td>
                <td colspan="2" align="right"><div align="center">
                  <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">
                </div></td>
              </tr>
            </table>
          </form>
          <?php
mysql_close($objConnect);
?>
      </div></td>
    </tr>
    <tr>
      <td>          </tr>
    <tr>
      <td width="248">          </tr>
    
   
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
