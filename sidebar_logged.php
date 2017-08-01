<div id="login">
 


 <h1>สวัสดีคุณ : <? echo @$user_dat['name'];?></h1> 
 
		
   <a href="<?=site_url()?>Member/Edit_member.php"> <input type="button" name="button2" id="button2" value="แก้ไขข้อมูลส่วนตัว" ></a>
      <a href="<?=site_url()?>Member/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์" ></a>
      <a href="<?=site_url()?>Member/listrepair.php"><input type="button" name="button5" id="button5" value="รายการแจ้งซ่อม"></a>
      <a href="<?=site_url()?>Webboard/Webboard.php"><input type="button" name="button6" id="button6" value="กระทู้ ถาม-ตอบ"> </a>
      <a href="<?=site_url()?>contact.php"><input type="button" name="button4" id="button4" value="ติดต่อเรา"> </a>
        <a href="<?=site_url()?>index.php"><input type="button" name="button9" id="button9" value="ออกจากระบบ"></a>
      </div>