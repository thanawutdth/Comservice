<!doctype html>
<html>
<head>
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
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	font-size: 14px;
}
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body topmargin="0" id="table">
<table width="956" border="2" align="center">
<tbody>
  <tr>
    <th height="212" colspan="2" scope="col"><table width="956" border="2" align="center">
      <tbody>
        </tbody>
      <tbody>
      </tbody>
      <tbody>
        <tr>
          <th height="212" colspan="2" scope="col"><img src="../Image/header2.jpg" width="953" height="212" alt=""/></th>
        </tr>
        <tr align="left" valign="top">
          <td height="239" align="center" valign="top"><div id="login">
            <h1>LOG IN</h1>
            <div id="border">
         <a href="/project2/Tofix/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์"  ></a>
          <a href="/project2/Device/Todevice.php">
          <input type="button" name="button5" id="button5" value="การเบิกอุปกรณ์">
            </a><a href="Repairing/repairing.html">
              <input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม">
              </a><a href="Webboard/webboard.html">
                <input type="button" name="button7" id="button7" value="กระทู้-ถามตอบ">
                </a><a href="Stat/stat.html">
                <input type="button" name="button8" id="button8" value="สถานะการแจ้งซ่อม">
                </a>
                <input type="button" name="button2" id="button2" value="ติดต่อเรา">
                <input type="button" name="button9" id="button9" value="ดาวน์โหลด">
            </div>
          </div></td>
          <td width="652" rowspan="2" align="center" valign="top">
          
            <form id="Fix" name="addFixr" method="post" action="/project2/addFix.php">
         <div ><table width="468" height="502" border="0" align="center"   >
             <tbody >
               <tr >
                 <td width="148" height="46" align="center" valign="middle"><p><strong>ชื่อ</strong></p></td>
                 <td width="347" align="left" valign="middle" scope="col"><input type="text" name="name" id="textfield"></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>นามสกุล</strong></p></td>
                 <td align="left" valign="middle"><input type="text" name="lastname" id="textfield2"></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>วันที่</strong></p></td>
                 <td align="left" valign="middle"><input type="date" name="date" id="date"></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>อาคาร</strong></td>
                 <td align="left" valign="middle"><input type="text" name="building" id="textfield3"></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>ชนิด</strong></td>
                 <td align="left" valign="middle"><p>
                   <select name="type" id="select">
                     <option>เลือกชนิดอุปกรณ์</option>
                     <option>เครื่องปริ้น</option>
                     <option>หน้าจอ</option>
                     <option>เมาส์</option>
                     <option>คีย์บอร์ด</option>
                   </select>
                 </p>
                   <p>
                     <label></label>
                   </p></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><p><strong>ปัญหา</strong></p></td>
                 <td align="left" valign="middle"><div id="aaa"><textarea name="detail" id="textarea2" ></textarea></div></td>
               </tr>
               <tr>
                 <td height="52" colspan="2" align="left" valign="top"><table width="490" border="0">
                   <tbody>
                     <tr>
                       <td width="143" height="46" align="center"><strong>เบอร์โทรศัพท์</strong></td>
                       <td width="337"><input type="tel" name="phone" id="tel"></td>
                     </tr>
                   </tbody>
                 </table></td>
               </tr>
               <tr>
                 <td height="134" colspan="2" valign="top"><p><strong> &nbsp;
                   </strong></p>
                   <table width="503" border="2">
                     <tbody>
                       <tr>
                         <td width="233"><strong>
                           <input type="submit" name="submit" id="submit" value="แจ้งซ่อม">
                         </strong></td>
                         <td width="252"><input type="reset" name="reset" id="reset" value="Reset"></td>
                       </tr>
                     </tbody>
                   </table>
                   <p>&nbsp;</p></td>
               </tr>
             </tbody>
           </table>
         </div> </form>
         </td>
        </tr>
        <tr>
          <td width="251" >&nbsp;</td>
        </tr>
        <tr>
          <td height="19" colspan="2">&nbsp;</td>
        </tr>
      </tbody>
      <tbody>
      </tbody>
      <tbody>
      </tbody>
    </table></th>
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
