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
}
print_r ($_POST);
if (isset($_POST['fix_id_inp'])) {
  $insertdata = array(
    "name" =>$_POST['name'],
    "date" =>$_POST['date'],
    "sector" =>$_POST['sector'],
    "type" =>$_POST['type'],
    "detail" =>$_POST['detail'],
    "phone" =>$_POST['phone'],
	"status" =>$_POST['select'],
	"infer" =>$_POST['infer'],
	"technician" =>$_POST['technician']);
	
    
    $m_fix->update_fix($insertdata,$_POST['fix_id_inp']);
}
if (isset($_POST['del_fix_id'])) {
  $insertdata = array(
    "status" =>"ยกเลิก");
    $m_fix->update_fix($insertdata,$_POST['del_fix_id']);
}
$fix_db = $m_fix->get_all();




?>  
    <tr>
      <td width="949" colspan="2" align="center">
        <table width="200" border="0">
          <tbody>
            <tr>
              <td height="40" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="890" border="0">
                  <tbody>
                    <tr>
                      <td width="3%"><a href="<?=site_url()?>Admin/adminlogin.php">
                        <input type="image" name="imageField" id="imageField" src="<?=site_url()?>Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK </h3></td>
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
          <td><strong></strong></td>
        </tr>
        </tbody>
<?php
foreach ($fix_db->result as $key => $value)
{ 
  if (isset($_POST['fix_id'])&&$_POST['fix_id']==$value["fix_id"]) {
    ?>
        <tr bgcolor="#FFFFFF">
          <td><? echo $value["fix_id"];?></td>
          <td width="69"><input type="text" id="name_inp" value="<? echo $value["name"];?>"></td>  
          <td width="93"><input type="text" id="date_inp" value="<? echo $value["date"];?>"></td>
          <td width="103"><input type="text" id="sector_inp" value="<? echo $value["sector"];?>"></td>
          <td width="103"><input type="text" id="type_inp" value="<? echo $value["type"];?>"></td>
          <td width="193"><input type="text" id="detail_inp" value="<? echo $value["detail"];?>"></td>
          <td width="89"><input type="text" id="phone_inp" value="<? echo $value["phone"];?>"></td>
          <td width="42" ><select id="status_inp">
            <option value="รอดำเนินการ">รอดำเนินการ</option>
            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
            <option value="ไม่สามารถดำเนินการได้">ไม่สามารถดำเนินการได้</option>
          </select>
          
           <script>
			  $("#sector").val("<? echo $value['select']?>");
              </script>
          
          </td>
          <td width="88" ><input type="text" id="infer_inp" value="<? echo $value["infer"];?>"></td>
          <td width="103"><input type="text" id="technician_inp" value="<? echo $value["technician"];?>"></td>
          <td width="103">
        
              <a href="javascript:save_row(<?=$value["fix_id"]?>);">Update</a><br><a href="">Cancel</a>
              
        </td>
        </tr>
      <?
  }else{
  ?>
        <tr bgcolor="#FFFFFF">
          <td><? echo $value["fix_id"];?></td>
          <td width="69"><? echo $value["name"];?></td>  
          <td width="93"><? echo $value["date"];?></td>
          <td width="103"><? echo $value["sector"];?></td>
          <td width="103"><? echo $value["type"];?></td>
          <td width="193"><? echo $value["detail"];?></td>
          <td width="89"><? echo $value["phone"];?></td>
          <td width="42" ><? 
		  if($value['status']=="รอดำเนินการ"){
			  ?>
              <img src="<?=site_url()?>Image/icon left bar/Wait.png" width="32" height="32" alt=""/>
			  <?
			  }else if($value['status']=="เสร็จสิ้น")
			  {		
			 	 ?>
				<img src="<?=site_url()?>Image/icon left bar/Correct.png" width="32" height="32" alt=""/>
				  <?
			  }else if($value['status']=="ไม่สามารถดำเนินการได้")
			  {		
			 	 ?>
				<img src="<?=site_url()?>Image/icon left bar/Close.png" width="32" height="32" alt=""/>
				  <?
			  }
				  
			  ?>
		 </td>
          <td width="88"><? echo $value["infer"];?></td>
          <td width="103"><? echo $value["technician"];?></td>
          <td width="103">
              <a href="<?=site_url('print_pdf.php?id='.$value["fix_id"])?>">Print</a>
              
			</td>
        </tr>
      <? }}?>
        </table></div>
     </td>
    </tr>
</table>


<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="<?=site_url()?>js/bootstrap-3.3.4.js" type="text/javascript"></script>
<script type="text/javascript">
  function save_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Admin/list_repair.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="fix_id_inp" value="'+id+'"><input type="text" name="name" value="'+$("#name_inp").val()+'"><input type="text" name="date" value="'+$("#date_inp").val()+'"><input type="text" name="sector" value="'+$("#sector_inp").val()+'"><input type="text" name="type" value="'+$("#type_inp").val()+'"><input type="text" name="detail" value="'+$("#detail_inp").val()+'"><input type="text" name="phone" value="'+$("#phone_inp").val()+'"><input type="select" name="select" value="'+$("#status_inp").val()+'"><input type="text" name="infer" value="'+$("#infer_inp").val()+'"><input type="text" name="technician" value="'+$("#technician_inp").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function edit_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Admin/list_repair.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="fix_id" value="'+id+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function del_row(id){
          if (confirm("Confirm Delete")) {
            myform = document.createElement("form");
            $(myform).attr("action","<?=site_url("Admin/list_repair.php")?>");   
            $(myform).attr("method","post");
            $(myform).html('<input type="text" name="del_fix_id" value="'+id+'">')
            document.body.appendChild(myform);
            myform.submit();
            $(myform).remove();
          }
        }
</script>
</body>
</html>
