<? include('meta_technic.php');
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

if (isset($_POST['device_id_inp'])) {
  $insertdata = array(
    "type" =>$_POST['type']);
    
$m_device->update_device($insertdata,$_POST['device_id_inp']);
}
if (isset($_POST['del_device_id'])) {

    $m_device->delete_device($_POST['del_device_id']);
}
$device_db = $m_device->get_all_device();
?>
    <tr align="center">
      <td>      
        <table width="200" border="0" align="center">
          <tbody>
            <tr>
              <td height="40" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="890" border="0">
                  <tbody>
                    <tr>
                      <td width="3%"><a href="<?=site_url()?>Technic/techniclogin.php">
                        <input type="image" name="imageField" id="imageField" src="<?=site_url()?>Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK </h3></td>
                      <td width="52%" align="center"><span style="color: #4C7D9B">
                      <h1>รายการอุปกรณ์</h1></span></td>
                      <td width="25%"><table width="200" border="0">
                        <tbody>
                            <tr>
                              <td width="13%">&nbsp;</td>
                              <td width="63%">&nbsp;</td>
                              <td width="24%">&nbsp;</td>
                            </tr>
                        </tbody>
                        </table></td>
                    </tr>
                  </tbody>
              </table></td> 
            </tr> </tbody></table>
       
       
       
       
       
        <p>
          
		  
        </p>
        <div id="tarang">
          <form name="frmMain" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
            <input type="hidden" name="hdnCmd" value="">
            <table width="891" border="1" align="center">
              <tr>
                <th width="63">device_id</th>
                <th width="757"> <div align="center">type </div></th>
                
                <th width="49"> <div align="center">Edit Delete </div></th>
               
              </tr>
 <?
foreach ($device_db->result as $key => $objResult)
{
	 if (isset($_POST['device_id'])&&$_POST['device_id']==$objResult["device_id"]) {   
?>
           
             
              <tr>
         		<td><? echo $objResult["device_id"];?></td>
                <td><input type="text" id="type_inp" value="<? echo $objResult["type"];?>"></td>
                <
                
              <td> <a href="javascript:save_row('<?=$objResult["device_id"]?>');">Update</a><br><a href="">Cancel</a></td>
              </tr>
   <?
  }else{
  ?>
        <tr bgcolor="#FFFFFF" align="center">
          <td><? echo $objResult["device_id"];?></td>
          <td width="757"><? echo $objResult["type"];?></td>  
          
         
          <td width="49">
               <a href="javascript:edit_row('<?=$objResult["device_id"]?>');">Edit</a><br><a href="javascript:del_row('<?=$objResult["device_id"]?>');">Delete</a>
			</td>
        </tr>
      <? }}?>
        </table></div>
     </td>
    </tr>
</table>
<script type="text/javascript">
function save_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Technic/Todevice.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="device_id_inp" value="'+id+'"><input type="text" name="type" value="'+$("#type_inp").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function edit_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Admin/Todevice.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="device_id" value="'+id+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function del_row(id){
          if (confirm("Confirm Delete")) {
            myform = document.createElement("form");
            $(myform).attr("action","<?=site_url("Technic/Todevice.php")?>");   
            $(myform).attr("method","post");
            $(myform).html('<input type="text" name="del_device_id" value="'+id+'">')
            document.body.appendChild(myform);
            myform.submit();
            $(myform).remove();
          }
        }
</script>
</body>
</html>
