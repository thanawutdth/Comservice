<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ComputerService</title>
<link href="../css/login.css" rel="stylesheet" type="text/css" />
<link href="../css/registextbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(../Image/white-wallpaper-18.jpg);
}
</style>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	color: #000000;
}
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body topmargin="0">
<body topmargin="0">
<table width="200" border="2" align="center">
  <tbody>
    <tr>
      <th height="212" colspan="2" scope="col"><img src="../Image/header2.jpg" width="911" height="212" alt=""/></th>
    </tr>
    <tr align="left" valign="top">
      <td height="253" align="left"><div id="login">
        <h1>LOG IN</h1>
        <form >
          <input type="Text" placeholder="username" />
          <input type="password" placeholder="Password" />
          <input type="submit" value="Submit" />
        </form>
      </div></td>
      
     
      <td align="center" valign="top">
      <div><form name="Device" action="/Project2/addDevice_Database.php">
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      
        <table width="367" height="261" border="0">
          <tbody>
     <tr>
              <td height="37" colspan="2" align="center" valign="middle" ><table width="411" border="0">
                <tbody>
                  <tr>
                    <td width="199" height="24" align="center"><strong>ชื่อนามสกุล</strong></td>
                    <td width="202"><input type="text" name="flname" id="textfield"></td>
                  </tr>
                </tbody>
              </table>              
                </tr>
            
&nbsp;
   
            
            <tr>
              <td width="172" height="24" align="center" valign="middle" ><strong>อุปกรณ์ที่เบิก</strong></td>
              <td width="179"><select name="type" id="select" >
                <option value="1">อูปกรณ์ชุดไขควง</option>
                <option value="2">เม้าส์</option>
                <option value="3">คีย์บอร์ด</option>
                <option value="4">สายไฟ</option>
              </select></td>  
            </tr>
            <tr>
              <td height="24" align="center" valign="middle"><strong>วันที่เบิก</strong></td>
              <td><input name="date" type="date" id="date" title="วันที่เบิก"></td>&nbsp;&nbsp;
            </tr>
            <tr>
              <td height="102"><input type="submit" name="submit" id="submit" value="Submit"></td>
              <td>         
                  <input type="reset" name="reset2" id="reset2" value="Reset"></td>
            </tr>
          
        </table></form>
      </div></td>
    </tr>
     <tr>
    <td width="248" height="48" ><a href="../Tofix/ToFix.html"><input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์"></a></td>
      <td width="657">&nbsp;</td>
    </tr>
    <tr>
   
      <td><a href="/Project2/Device/Todevice.php"><input type="button" name="button5" id="button5" value="การเบิกอุปกรณ์"></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="../Repairing/repairing.html"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="../Webboard/webboard.html"><input type="button" name="button7" id="button7" value="กระทู้-ถามตอบ"></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="../Stat/stat.html"><input type="button" name="button8" id="button8" value="สถานะการแจ้งซ่อม"></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="../Download/download.html"><input type="button" name="button9" id="button9" value="ดาวน์โหลด"></a></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td height="19" colspan="2">&nbsp;</td>
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
