<? include('meta_technic.php');
require_once("../model/m_user.php");
$m_user = new M_user;
if(isset($_POST['name'])){
		$insertdata = array(
		"name" =>$_POST['name'],
		"password" =>$_POST['password'],
		//"name" =>$_POST['name'],
		"lastname" =>$_POST['lastname'],
		"phone" =>$_POST['phone'],
		"email" =>$_POST['email']);
		
		$m_user->update_technic($insertdata,$_SESSION['username']);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
            window.open("<?echo site_url('Technic/editdatatech.php');?>","_self");            
        </script>
    <?
	}
	print_r ($_POST);
$user_dat=$m_user->get_user_admin($_SESSION['username']);
$err_msg="";
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('logout.php');?>","_self");            
        </script>
    <?
}

?>  



     <tr>
      <td width="248" height="72">
        <? include("sidebar_technic.php");?>
      </td>
  
    <form id="Member" name="addMember" method="post" action="<?=site_url()?>Technic/editdatatech.php">  
    <td width="657" rowspan="9" valign="top"><fieldset>
      <legend><h3><span style="color:#2288BB">ข้อมูลส่วนตัว</span></h3></legend>
      
      <table width="476" height="270" border="0" align="center" id="regis"  >
        <tbody>
          <tr>
            <th width="232" height="49" scope="col" align="center"><label>ชื่อผู้ใช้งาน</label>&nbsp;</th>
            <th width="234" scope="col" align="left"><label for="textfield"></label>
              <input disabled type="text" name="username" id="username" placeholder="ชื่่อผู้ใช้งาน" value="<? echo $user_dat['username'];?>" ></th>
            </tr>
          <tr>
            <td height="19" align="center"><strong>พาสเวิร์ด&nbsp;</strong></td>
            <td ><input name="password" type="password"  placeholder="รหัสผ่าน" value="<? echo $user_dat['password'];?>"></td>
            </tr>
          <tr>
            <td height="34" align="center"><strong>ชื่อ</strong></td>
            <td><input type="text" name="name"  placeholder="ชื่อ" value="<? echo $user_dat['name'];?>"></td>
          </tr>
          <tr>
            <td height="34" align="center"><label><strong> นามสกุล</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input name="lastname" type="text" id="textfield" placeholder="นามสกุล" value="<? echo $user_dat['lastname'];?>"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>เบอร์โทรศัพท์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="tel" name="phone" id="tel" placeholder="เบอร์โทรศัพท์" value="<? echo $user_dat['phone'];?>"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>อีเมลล์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="email" name="email" id="email" placeholder="อีเมลล์" value="<? echo $user_dat['email'];?>"></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><input type="submit" name="submit" id="submit" value="Submit"></td>
          </tr>
          </tbody>
      </table>
    </fieldset></td></form>
    </tr>
    
   
    <tr>
      <td height="19" colspan="2">
      
      
      
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
