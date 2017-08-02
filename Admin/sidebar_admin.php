<div id="login">
 


  <a href="<?=site_url()?>Admin/adminlogin.php"><h1>Computerservice</h1></a> 
  <h1>สวัสดีคุณ : <? echo @$user_dat['name'];?></h1> 
  <?
if (isset($user_dat['picture'])) {
  ?>
  <div><img  src="<?=site_url("files/profile/".$user_dat['picture'])?>" style="max-width: 220px;"></div>
  <br>
  <?
}
?>

 <a href="<?=site_url()?>Admin/edit_admin.php"> <input  type="button" name="button1" id="button1" value="แก้ไขข้อมูลส่วนตัว">
 <a href="<?=site_url()?>Admin/adminlogin.php"> <input  type="button" name="button1" id="button1" value="เพิ่มผู้ดูแลระบบและช่างซ่อม"  ></a>
 <a href="<?=site_url()?>Admin/Admin_Technic.php"> <input  type="button" name="button1" id="button1" value="รายชื่อผู้ดูแลและช่างซ่อม"  ></a>
 <a href="<?=site_url()?>Admin/To_fix.php"><input type="button" name="button6" id="button6" value="แจ้งซ่อม"></a>
 <a href="<?=site_url()?>Admin/list_repair.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
  <a href="<?=site_url()?>Admin/memberlist.php"><input type="button" name="button5" id="button5" value="รายชื่อสมาชิก"></a>
  <a href="<?=site_url()?>Admin/regisformember.php"><input type="button" name="button9" id="button9" value="สมัครสมาชิก"></a>
  <a href="<?=site_url()?>Admin/Todevice.php"><input type="button" name="button7" id="button7" value="รายการอุปกรณ์"></a>
  <a href="<?=site_url()?>Admin/add_device_admintech.php"><input type="button" name="button7" id="button7" value="เบิกอุปกรณ์"></a><a href="<?=site_url()?>Admin/adddevice.php"><input type="button" name="button7" id="button7" value="เพิ่มอุปกรณ์"></a>
  <a href="<?=site_url()?>Admin/selectdevice.php"><input type="button" name="button7" id="button7" value="รายการเบิกอุปกรณ์"></a>
  <a href="<?=site_url()?>Webboard/Webboard.php"><input type="button" name="button8" id="button8" value="กระทู้"></a>
  
   <a href="<?=site_url()?>logout.php"><input type="button" name="button9" id="button9" value="ออกจากระบบ"></a>

        </div>
        
      </div>