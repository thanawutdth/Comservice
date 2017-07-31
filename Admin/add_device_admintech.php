<? include('meta_admin.php');
require_once("../model/m_user.php");
require_once("../model/m_device.php");
$m_user = new M_user;
$m_device = new M_device;

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

print_r ($_POST);
if(isset($_POST['type'])){
		$insertdata = array(
		"type" =>$_POST['type']);
		
		$m_device->insert_device($insertdata);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
         window.open("<?echo site_url('Admin/Todevice.php');?>","_self");            
        </script>
    <?
	}
?>  
    <tr>
      <td width="248">
 
<? include("sidebar_admin.php");?>
        </td>
        
      <td width="657" rowspan="9" align="center" valign="top">
      
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="455" height="128" border="0">
      <td width="449" height="17">  <table width="452" height="128" border="0">
          <tbody>
          <form name="form" method="post" action="<?=site_url()?>Admin/adddevice.php">
            <tr align="center">
              <td width="176"><strong>จำนวน</strong></td>
              <td width="266"><input type="text" name="type" id="type"></td>
              <
            </tr>
            <tr align="center">
              <td><strong>อุปกรณ์ที่เบิก</strong></td>
              <td><select name="select" id="select">
              </select></td>
              </tr>
            <tr align="center">
              <td><strong>วันที่เบิก</strong></td>
              <td><input type="date" name="date" id="date"></td>
              </tr>
            <tr align="center">
              <td><strong>วันที่คืน</strong></td>
              <td><input type="date" name="date2" id="date2"></td>
              </tr>
            <tr align="center">
              <td>&nbsp;</td>
              <td><input type="submit" name="submit2" id="submit5" value="Submit"></td>
              </tr>
          </form>
  <td height="17">
  </table>
      
      </table>
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
