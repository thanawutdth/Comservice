<div id="login">
 


  <a href="<?=site_url()?>Technic/techniclogin.php"><h1>TECHNICIAN</h1></a> 
    <h1>สวัสดีคุณ : <? echo @$user_dat['name'];?></h1> 
  <?
if (isset($user_dat['picture'])) {
  ?>
  <div><img  src="<?=site_url("files/profile/".$user_dat['picture'])?>" style="max-width: 220px;"></div>
  <br>
  <?
}
?>


 
  <a href="<?=site_url()?>Technic/editdatatech.php"> <input  type="button" name="button1" id="button1" value="แก้ไขข้อมูลส่วนตัว"  ></a>
 
  
  <a href="<?=site_url()?>Technic/list_repair.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
  <a href="<?=site_url()?>Technic/To_fix.php"><input type="button" name="button6" id="button6" value="แจ้งซ่อม"></a>
   
  <a href="<?=site_url()?>Technic/add_device_admintech.php"><input type="button" name="button7" id="button7" value="เบิกอุปกรณ์"></a>
  <a href="<?=site_url()?>Technic/selectdevice.php"><input type="button" name="button7" id="button7" value="รายการเบิกอุปกรณ์"></a>
  
  <a href="<?=site_url()?>Webboard/Webboard.php"><input type="button" name="button8" id="button8" value="กระทู้"></a>
	<a href="<?=site_url()?>logout.php"><input type="button" name="button9" id="button9" value="ออกจากระบบ"></a>

       
        
      </div>