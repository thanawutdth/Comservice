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

if (isset($_POST['device_id_inp'])) {
  $insertdata = array(
	"status" =>$_POST['status']);
    
$m_device->update_device_addtech($insertdata,$_POST['device_id_inp']);
}
if (isset($_POST['del_device_id'])) {

    $m_device->delete_device($_POST['del_device_id']);
}
$device_addtech_id = $m_device->get_all_deveice_addtech();
?>
    <tr>
      <td>      
        <table width="200" border="0" align="center">
          <tbody>
            <tr>
              <td height="40" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="890" border="0">
                  <tbody>
                    <tr>
                      <td width="4%"><a href="<?=site_url()?>Admin/adminlogin.php">
                        <input type="image" name="imageField" id="imageField" src="<?=site_url()?>Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK </h3></td>
                      <td width="63%" align="center"><span style="color: #4C7D9B">
                      <h1>รายการเบิกอุปกรณ์</h1></span></td>
                      <td width="13%">&nbsp;</td>
                    </tr>
                  </tbody>
              </table></td> 
            </tr> </tbody></table>
       
       
       
       
       
        <p>
          
		  
        </p>
        <div id="tarang" align="center">
          <form name="frmMain" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
            <input type="hidden" name="hdnCmd" value="">
            <table width="891" border="1" align="center">
              <tr>
                <th width="75">device_id</th>
                <th width="75">จำนวน</th>
                <th width="75">วันที่เบิก</th>
                <th width="75">วันที่คืน</th>
                <th width="75"> <div align="center">สถานะ</div></th>
                
                <th width="42"> <div align="center">Edit Delete </div></th>
               
              </tr>
 <?
foreach ($device_addtech_id->result as $key => $objResult)
{
	$getdevice = $m_device->get_device($objResult['device_id']);
	 if (isset($_POST['device_addtech_id'])&&$_POST['device_addtech_id']==$objResult["device_addtech_id"]) {   
?>
           
             
              <tr>
         		<td><? echo $getdevice['type'];?></td>
         		<td><? echo $objResult["amount"];?></td>
         		<td><? echo $objResult["date"];?></td>
         		<td><? echo $objResult["date_re"];?></td>
                <td><select name="status" id="status_inp">
                <option value="เบิก">เบิก</option>
                <option value="คืน">คืน</option>
             
                </select>
                
                  <script>
			  $("#status_inp").val("<? echo $objResult['status']?>");
              </script>
          
                </td>
                
                
              <td> <a href="javascript:save_row('<?=$objResult["device_addtech_id"]?>');">Update</a><br><a href="">Cancel</a></td>
              </tr>
   <?
  }else{
  ?>
        <tr bgcolor="#FFFFFF" align="center">
          <td><? echo $getdevice['type'];?></td>
          <td width="69"><? echo $objResult["amount"];?></td>
          <td width="69"><? echo $objResult["date"];?></td>
          <td width="69"><? echo $objResult["date_re"];?></td>
          <td width="69"><? echo $objResult["status"];?></td>  
          
         
          <td width="103">
               <a href="javascript:edit_row('<?=$objResult["device_addtech_id"]?>');">Edit</a><br>
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
          $(myform).attr("action","<?=site_url("Admin/selectdevice.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="device_id_inp" value="'+id+'"><input type="text" name="amount" value="'+$("#amount_inp").val()+'"><input type="text" name="date" value="'+$("#date_inp").val()+'"><input type="text" name="date_re" value="'+$("#date_re_inp").val()+'"><input type="text" name="status" value="'+$("#status_inp").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function edit_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Admin/selectdevice.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="device_addtech_id" value="'+id+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function del_row(id){
          if (confirm("Confirm Delete")) {
            myform = document.createElement("form");
            $(myform).attr("action","<?=site_url("Admin/selectdevice.php")?>");   
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
