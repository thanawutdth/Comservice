<? include('meta_admin.php');
require_once("../model/m_user.php");
$m_user = new M_user;


$user_dat=$m_user->get_user_admin($_SESSION['username']);
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('logout.php');?>","_self");            
        </script>
    <?
}
//print_r ($_POST);

if(isset($_POST['username'])){
		$insertdata = array(
		"username" =>$_POST['username'],
		"password" =>$_POST['password'],
		"name" =>$_POST['name'],
		"lastname" =>$_POST['lastname'],
		"phone" =>$_POST['phone'],
		"email" =>$_POST['email'],
		"address" =>$_POST['address'],
		"sector" =>$_POST['sector']);
		
		$m_user->insert_member($insertdata);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
         window.open("<?echo site_url('Admin/memberlist.php');?>","_self");            
        </script>
    <?
	}
?>  
    <tr>
      <td width="248">
  
<? include("sidebar_admin.php");?>
      </td>
        
    <form id="Member" name="addMember" method="post" action="<?=site_url()?>Admin/regisformember.php">  
    <td width="657" rowspan="9" valign="top"><fieldset>
      <legend><h3><span style="color:#2288BB">ข้อมูลส่วนตัว</span></h3></legend>
      
      <table width="476" height="270" border="0" align="center" id="regis"  >
        <tbody>
          <tr>
            <th width="232" height="49" scope="col" align="center"><label>ชื่อผู้ใช้งาน</label>&nbsp;</th>
            <th width="234" scope="col" align="left"><label for="textfield"></label>
              <input type="text" name="username" id="username" placeholder="ชื่่อผู้ใช้งาน" ></th>
            </tr>
          <tr>
            <td height="19" align="center"><strong>พาสเวิร์ด&nbsp;</strong></td>
            <td ><input name="password" type="password"  placeholder="รหัสผ่าน" ></td>
            </tr>
          <tr>
            <td height="34" align="center"><strong>ชื่อ</strong></td>
            <td><input type="text" name="name"  placeholder="ชื่อ"></td>
          </tr>
          <tr>
            <td height="34" align="center"><label><strong> นามสกุล</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input name="lastname" type="text" id="lastname" placeholder="นามสกุล"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>เบอร์โทรศัพท์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="tel" name="phone" id="phone" placeholder="เบอร์โทรศัพท์"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>อีเมลล์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="email" name="email" id="email" placeholder="อีเมลล์"></td>
          </tr>
          <tr>
            <td align="center"><strong>ที่อยู่</strong></td>
            <td><textarea name="address" id="textarea"></textarea></td>
            </tr>
          <tr>
            <td align="center"><label><strong>โรงเรียน/ตำแหน่ง</strong></label>
              <strong>&nbsp;</strong></td>
            <td><p>
              <select  name="sector" id="sector"   >
                <option>หน่วยงานในสังกัด</option>
                <option>โรงเรียนเมืองเตาวิทยาคม</option>
                <option>โรงเรียนท่าขอนยางพิทยาคม</option>
                <option>โรงเรียนหนองบัวปิยนิมิตร</option>
                <option>โรงเรียนมะค่าพิทยาคม </option>
                <option>โรงเรียนหนองเหล็กศึกษา</option>
                <option>โรงเรียนนาสีนวนพิทยาสรรค์</option>
                <option>โรงเรียนหนองโพธิ์วิทยาคม</option>
                <option>โรงเรียนนาข่าวิทยาคม</option>
                <option>โรงเรียนมัธยมดงยาง</option>
                <option>โรงเรียนเกิ้งวิทยานุกูล</option>
                <option>โรงเรียนขามป้อมพิทยาคม</option>
                <option>โรงเรียนเลิงแฝกประชาบำรุง</option>
                <option>โรงเรียนโคกก่อพิทยาคม</option>
                <option>โรงเรียนดอนเงินพิทยาคาร</option>
                <option>โรงเรียนหนองโกวิชาประสิทธิ์</option>
                <option>โรงเรียนเสือโก้กวิทยาสรรค์ </option>
                <option>โรงเรียนเวียงสะอาดพิทยาคม</option>
                <option>โรงเรียนงัวบาวิทยาคม</option>
                <option>โรงเรียนศรีสุขพิทยาคม</option>
                <option>โรงเรียนหัวเรือพิทยาคม</option>
                <option>องค์การบริหารส่วนจังหวัดมหาสารคาม</option>
              </select>
            </p>
              <p>&nbsp;</p></td>
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
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
