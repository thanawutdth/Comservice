<?
include('../meta.php');
require_once("../model/m_user.php");
require_once("../model/m_fix.php");
$m_user = new M_user;
$m_fix = new M_fix;
$user_dat=$m_user->get_user_admin($_SESSION['username']);
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('../logout.php');?>","_self");            
        </script>
    <?
}

$fix_db = $m_fix->get_all();




?>  
    <tr>
      <td width="949" colspan="2" align="center">
        <table width="200" border="0">
          <tbody>
            <tr>
              <td height="40" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="200" border="0">
                  <tbody>
                    <tr>
                      <td width="3%"><a href="<?=site_url()?>Admin/adminlogin.php">
                        <input type="image" name="imageField" id="imageField" src="<?=site_url()?>Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK TO HOME</h3></td>
                      <td width="52%" align="center"><span style="color: #4C7D9B"><h1>รายการแจ้งซ่อม</h1></span></td>
                      <td width="25%"><table width="200" border="0">
                        <tbody>
                            <tr>
                              <td width="13%"><img src="<?=site_url()?>Image/icon left bar/Search.png" width="32" height="32" alt=""/></td>
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
                      <td width="4%" style="font-size: 14px"><strong><img src="<?=site_url()?>Image/icon left bar/Correct.png" width="32" height="32" alt=""/></strong></td>
                      <td width="8%" style="font-size: 14px"><strong style="color: #84C119">เสร็จสิ้น</strong></td>
                      <td width="4%" style="font-size: 14px"><strong><img src="<?=site_url()?>Image/icon left bar/Wait.png" width="32" height="32" alt=""/></strong></td>
                      <td width="9%" style="font-size: 14px"><strong>รอดำเนินการ</strong></td>
                      <td width="4%" style="font-size: 14px"><strong><img src="<?=site_url()?>Image/icon left bar/Close.png" width="32" height="32" alt=""/></strong></td>
                      <td width="16%" style="font-size: 14px"><span style="color: #FF0027"><strong>ไม่สามารดำเนินการได้</strong></span></td>
                    </tr>
                  </tbody>
                  </table>
              </div>
      <div id="tarang" >        
        <table width="956" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="40" height="23"><strong>ลำดับที่</strong></td>
          <td><strong>ชื่อ</strong></td>
          
          <td><strong>วันที่</strong></td>
          <td><strong>หน่วยงาน</strong></td>
          <td><strong>ชนิดอุปกรณ์</strong></td>
          <td><strong>รายละเอียด</strong></td>
          <td><strong>เบอร์โทรศัพท์</strong></td>
          <td><strong>สถานะ</strong></td>
          <td><strong>ปัญหาที่พบ</strong></td>
          <td><strong>ผู้ดำเนินการ</strong></td>
          <td><strong>Edit Delete</strong></td>
        </tr>
        </tbody>
<?php
foreach ($fix_db->result as $key => $value)
{ ?>
        <tr bgcolor="#FFFFFF">
          <td><? echo $value["fix_id"];?></td>
          <td width="69"><? echo $value["name"];?></td>  
          <td width="93"><? echo $value["date"];?></td>
          <td width="103"><? echo $value["sector"];?></td>
          <td width="103"><? echo $value["type"];?></td>
          <td width="193"><? echo $value["detail"];?></td>
          <td width="89"><? echo $value["phone"];?></td>
          <td width="42" ><? echo $value[""];?><img src="<?=site_url()?>Image/icon left bar/Wait.png" width="32" height="32" alt=""/></td>
          <td width="88"><? echo $value["infer"];?></td>
          <td width="103"><? echo $value["technician"];?></td>
          <td width="103"><? if($value["fixuser"]==$_SESSION['username']){
			  ?>
              <a href="">Edit</a><br><a href="">Delete</a>
              
			  <?
          }?></td>
        </tr>
      <? }?>
        </table></div>
     </td>
    </tr>
</table>


<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="<?=site_url()?>js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
