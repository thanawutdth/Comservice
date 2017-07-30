<?php header('Content-Type: charset=utf-8'); ?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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



<body topmargin="0">

<table width="67%" height="256" border="0" align="center">
  
    <tr>
      <th height="206" colspan="2" scope="col"><img src="../Image/header2.jpg" width="955" height="204" alt=""/></th>
    </tr>
    
  
    
    
    <tr>
      <td width="949" colspan="2" align="center">
        <table width="200" border="0">
          <tbody>
            <tr>
              <td height="40" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="200" border="0">
                  <tbody>
                    <tr>
                      <td width="3%"><a href="/project2/Member/firstpage_member.php">
                        <input type="image" name="imageField" id="imageField" src="/project2/Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK TO HOME</h3></td>
                      <td width="52%" align="center"><span style="color: #4C7D9B"><h1>รายการแจ้งซ่อม</h1></span></td>
                      <td width="25%"><table width="200" border="0">
                        <tbody>
                            <tr>
                              <td width="13%"><img src="/project2/Image/icon left bar/Search.png" width="32" height="32" alt=""/></td>
                              <td width="63%"><input type="search" name="search" id="search"></td>
                              <td width="24%"><input type="button" name="button" id="button" value="Search"></td>
                            </tr>
                        </tbody>
                        </table></td>
                    </tr>
                  </tbody>
              </table></td> 
            </tr> </tbody></table>
              &nbsp;
              <div id="">
                <table width="84%">
                  <tbody>
                    <tr style="font-size: 14px; color: #351DAF;">
                      <td width="55%" height="34" style="font-size: 9px">&nbsp;</td>
                      <td width="4%" style="font-size: 14px"><strong><img src="/project2/Image/icon left bar/Correct.png" width="32" height="32" alt=""/></strong></td>
                      <td width="8%" style="font-size: 14px"><strong style="color: #84C119">เสร็จสิ้น</strong></td>
                      <td width="4%" style="font-size: 14px"><strong><img src="/project2/Image/icon left bar/Wait.png" width="32" height="32" alt=""/></strong></td>
                      <td width="9%" style="font-size: 14px"><strong>รอดำเนินการ</strong></td>
                      <td width="4%" style="font-size: 14px"><strong><img src="/project2/Image/icon left bar/Close.png" width="32" height="32" alt=""/></strong></td>
                      <td width="16%" style="font-size: 14px"><span style="color: #FF0027"><strong>ไม่สามารดำเนินการได้</strong></span></td>
                    </tr>
                  </tbody>
                  </table>
              </div>
      <div id="tarang" >        
        <table width="956" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="35" height="23"><strong>ลำดับที่</strong></td>
          <td><strong>ชื่อ</strong></td>
          
          <td><strong>วันที่</strong></td>
          <td><strong>หน่วยงาน</strong></td>
          <td><strong>ชนิดอุปกรณ์</strong></td>
          <td><strong>รายละเอียด</strong></td>
          <td><strong>เบอร์โทรศัพท์</strong></td>
          <td><strong>สถานะ</strong></td>
          <td><strong>ปัญหาที่พบ</strong></td>
          <td><strong>ผู้ดำเนินการ</strong></td>
        </tr>
        </tbody>
<?php
include("../Listrepairing/connect.php");
$result = mysql_query("SELECT * FROM `fix_db` ");
while ($row = mysql_fetch_array($result))
{ ?>
        <tr bgcolor="#FFFFFF">
          <td><? echo $row["fix_id"];?></td>
          <td width="29"><? echo $row["name"];?></td>  
          <td width="132"><? echo $row["date"];?></td>
          <td width="113"><? echo $row["Building"];?></td>
          <td width="110"><? echo $row["type"];?></td>
          <td width="212"><? echo $row["detail"];?></td>
          <td width="91"><? echo $row["phone"];?></td>
          <td width="37" ><? echo $row[""];?><img src="/project2/Image/icon left bar/Wait.png" width="32" height="32" alt=""/></td>
          <td width="90"><? echo $row["infer"];?></td>
          <td width="138"><? echo $row["technician"];?></td>
        </tr>
      <? }?>
        </table></div>
        <p>
          <? mysql_close();?>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
        </p>
      <p>&nbsp;</p></td>
    </tr>
</table>

<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
