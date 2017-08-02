<? include('meta_admin.php');
require_once("../model/m_user.php");
$m_user = new M_user;


$user_dat=$m_user->get_user_admin($_SESSION['username']);
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
           // window.open("<?echo site_url('logout.php');?>","_self");            
        </script>
    <?
}

print_r ($_POST);
if(isset($_POST['username'])){
	
		
		
		
		
		$insertdata = array(
		"username" =>$_POST['username'],
		"password" =>$_POST['password'],
		"name" =>$_POST['name'],
		"lastname" =>$_POST['lastname'],
		"phone" =>$_POST['phone'],
		"email" =>$_POST['email'],
		"position" =>$_POST['position'],

		"photo" =>$newPictureName);
		
		
		$fileName = $_FILES[$_POST['photo1']]["name"];
		$fileType = $_FILES[$_POST['photo1']]["type"];
		$newPictureName = "img/".$_POST['username'].".jpg";
		
		if($fileType=="image/jpg"||$fileType=="image/jpeg"||$fileType=="image/png"){
		move_uploaded_file($_FILES[$_POST['photo1']]["tmp_name"],$newPictureName);
		}
		
		
		
		
		
		
		
		$m_user->insert_admin_technic($insertdata);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
        // window.open("<?echo site_url('Admin/Admin_Technic.php');?>","_self");            
        </script>
    <?
	}
?>  
    <tr>
      <td width="248">
  
<? include("sidebar_admin.php");?>
        </td>
        
      <td width="657" rowspan="9" align="center" valign="top">
      <form id="Admin" name="addAdmin" method="post" action="<?=site_url()?>Admin/adminlogin.php">
        <fieldset>
          <legend> <h3><span style="color:#2288BB">แอดมิน,ช่าง</span></h3></legend>
          <table width="476" height="270" border="0" align="center" id="regis"  >
            <tbody>
              <tr>
                <th height="49" scope="col" align="left"><strong>position</strong></th>
                <th scope="col" align="left"><select name="position" id="position">
                  <option>1</option>
                  <option>2</option>
                  </select></th>
                </tr>
              <tr>
                <th width="216" height="49" scope="col" align="left"><strong>
                  <label>Username</label>
                &nbsp;</strong></th>
                <th width="250" scope="col" align="left"><label for="textfield"></label>
                  <input type="text" name="username" id="username"  ></th>
                </tr>
              <tr>
                <td height="19"><strong>
                  <label>Password</label>
                &nbsp;</strong></td>
                <td ><input type="password" name="password" id="password" ></td>
                </tr>
              <tr>
                <td height="34"><strong>ชื่อ </strong></td>
                <td><input type="text" name="name" id="name" ></td>
                </tr>
              <tr>
                <td height="34"><strong>นามสกุล</strong></td>
                <td><input type="text" name="lastname" id="lastname" ></td>
                </tr>
              <tr>
                <td><strong>
                  <label>เบอร์โทรศัพท์</label>
                &nbsp;</strong></td>
                <td><input type="tel" name="phone" id="phone"></td>
                </tr>
              <tr>
                <td><strong>
                  <label>E-mail</label>
                &nbsp;</strong></td>
                <td><input type="email" name="email" id="email"></td>
                </tr>
              <tr>
                <td><strong>เพิ่มรูปภาพ</strong></td>
                <td><input type="file" name="photo1" id="photo1"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p>&nbsp;</p>
                  &nbsp;
                  <input type="submit" name="button" id="button" value="Submit">
                  <p>&nbsp;</p></td>
                </tr>
              </tbody>
          </table>
        </fieldset>
      </form></td>
    </tr>
    
   
   
      
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
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
