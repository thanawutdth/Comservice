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
print_r ($_POST);
if (isset($_POST['member_id_inp'])) {
  $insertdata = array(
    "username" =>$_POST['username'],
    "password" =>$_POST['password'],
    "name" =>$_POST['name'],
    "lastname" =>$_POST['lastname'],
    "phone" =>$_POST['phone'],
    "email" =>$_POST['email'],
	"address" =>$_POST['address'],
	"sector" =>$_POST['sector']);
$m_user->update_member_username($insertdata,$_POST['member_id_inp']);
}
if (isset($_POST['del_member_id'])) {

    $m_user->delete_member($_POST['del_member_id']);
}
$admin_db = $m_user->get_all_user();
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
                      <td width="3%"><a href="<?=site_url()?>Admin/adminlogin.php">
                        <input type="image" name="imageField" id="imageField" src="<?=site_url()?>Image/icon left bar/Back.png">
                      </a></td>
                      <td width="20%" height="43" style="color: #000000"><h3>BACK </h3></td>
                      <td width="52%" align="center"><span style="color: #4C7D9B"><h1>รายการสมาชิก</h1></span></td>
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
       
        <div id="tarang">
          <form name="frmMain" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
            <input type="hidden" name="hdnCmd" value="">
            <table width="891" border="1">
              <tr>
                <th width="75">member_id</th>
                <th width="75"> <div align="center">username </div></th>
                <th width="100"> <div align="center">password</div></th>
                <th width="100"> <div align="center">name</div></th>
                <th width="58"> <div align="center">lastname</div></th>
                <th width="39"> <div align="center">phone</div></th>
                <th width="89"><div align="center">email</div></th>
                <th width="89"><div align="center">address</div></th>
                <th width="84"> <div align="center">sector</div></th>
                <th width="42"> <div align="center">Edit Delete </div></th>
               
              </tr>
 <?
foreach ($admin_db->result as $key => $objResult)
{
	 if (isset($_POST['member_id'])&&$_POST['member_id']==$objResult["member_id"]) {   
?>
           
             
              <tr>
         		<td><? echo $objResult["member_id"];?></td>
                <td><input type="text" id="username_inp" value="<? echo $objResult["username"];?>"></td>
                <td><input type="text" id="password_inp" value="<? echo $objResult["password"];?>"></td>
                <td><input type="text" id="name_inp" value="<? echo $objResult["name"];?>"></td>
                <td><input type="text" id="lastname_inp" value="<? echo $objResult["lastname"];?>"></td>
                <td align="right"><input type="text" id="phone_inp" value="<? echo $objResult["phone"];?>"></td>
                <td align="right"><input type="text" id="email_inp" value="<? echo $objResult["email"];?>"></td>
                <td align="right"><input type="text" id="address_inp" value="<? echo $objResult["address"];?>"></td>
                <td width="42" > <select  name="sector" id="sector_inp"   >
                <option value="หน่วยงานในสังกัด">หน่วยงานในสังกัด</option>
                <option value="โรงเรียนเมืองเตาวิทยาคม">โรงเรียนเมืองเตาวิทยาคม</option>
                <option value="โรงเรียนท่าขอนยางพิทยาคม">โรงเรียนท่าขอนยางพิทยาคม</option>
                <option value="โรงเรียนหนองบัวปิยนิมิตร">โรงเรียนหนองบัวปิยนิมิตร</option>
                <option value="โรงเรียนมะค่าพิทยาคม ">โรงเรียนมะค่าพิทยาคม </option>
                <option value="โรงเรียนหนองเหล็กศึกษา">โรงเรียนหนองเหล็กศึกษา</option>
                <option value="โรงเรียนนาสีนวนพิทยาสรรค์">โรงเรียนนาสีนวนพิทยาสรรค์</option>
                <option value="โรงเรียนหนองโพธิ์วิทยาคม">โรงเรียนหนองโพธิ์วิทยาคม</option>
                <option value="โรงเรียนนาข่าวิทยาคม">โรงเรียนนาข่าวิทยาคม</option>
                <option value="โรงเรียนมัธยมดงยาง">โรงเรียนมัธยมดงยาง</option>
                <option value="โรงเรียนเกิ้งวิทยานุกูล">โรงเรียนเกิ้งวิทยานุกูล</option>
                <option value="โรงเรียนขามป้อมพิทยาคม">โรงเรียนขามป้อมพิทยาคม</option>
                <option value="โรงเรียนเลิงแฝกประชาบำรุง">โรงเรียนเลิงแฝกประชาบำรุง</option>
                <option value="โรงเรียนโคกก่อพิทยาคม">โรงเรียนโคกก่อพิทยาคม</option>
                <option value="โรงเรียนดอนเงินพิทยาคาร">โรงเรียนดอนเงินพิทยาคาร</option>
                <option value="โรงเรียนหนองโกวิชาประสิทธิ์">โรงเรียนหนองโกวิชาประสิทธิ์</option>
                <option value="โรงเรียนเสือโก้กวิทยาสรรค์ ">โรงเรียนเสือโก้กวิทยาสรรค์ </option>
                <option value="โรงเรียนเวียงสะอาดพิทยาคม">โรงเรียนเวียงสะอาดพิทยาคม</option>
                <option value="โรงเรียนงัวบาวิทยาคม">โรงเรียนงัวบาวิทยาคม</option>
                <option value="โรงเรียนศรีสุขพิทยาคม">โรงเรียนศรีสุขพิทยาคม</option>
                <option value="โรงเรียนหัวเรือพิทยาคม">โรงเรียนหัวเรือพิทยาคม</option>
                <option value="องค์การบริหารส่วนจังหวัดมหาสารคาม">องค์การบริหารส่วนจังหวัดมหาสารคาม</option>
              </select>
              
              <script>
			  $("#sector").val("<? echo $objResult['sector']?>");
              </script>
          
          </td>
                
              <td> <a href="javascript:save_row('<?=$objResult["member_id"]?>');">Update</a><br><a href="">Cancel</a></td>
              </tr>
   <?
  }else{
  ?>
        <tr bgcolor="#FFFFFF">
          <td><? echo $objResult["member_id"];?></td>
          <td width="69"><? echo $objResult["username"];?></td>  
          <td width="93"><? echo $objResult["password"];?></td>
          <td width="103"><? echo $objResult["name"];?></td>
          <td width="103"><? echo $objResult["lastname"];?></td>
          <td width="193"><? echo $objResult["phone"];?></td>
          <td width="89"><? echo $objResult["email"];?></td>
           <td width="89"><? echo $objResult["address"];?></td>
          <td width="42" ><? echo $objResult["sector"];?></td>
         
          <td width="103">
               <a href="javascript:edit_row('<?=$objResult["member_id"]?>');">Edit</a><br><a href="javascript:del_row('<?=$objResult["member_id"]?>');">Delete</a>
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
          $(myform).attr("action","<?=site_url("Admin/memberlist.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="member_id_inp" value="'+id+'"><input type="text" name="username" value="'+$("#username_inp").val()+'"><input type="text" name="password" value="'+$("#password_inp").val()+'"><input type="text" name="name" value="'+$("#name_inp").val()+'"><input type="text" name="lastname" value="'+$("#lastname_inp").val()+'"><input type="text" name="phone" value="'+$("#phone_inp").val()+'"><input type="text" name="email" value="'+$("#email_inp").val()+'"><input type="text" name="address" value="'+$("#address_inp").val()+'"><input type="select" name="sector" value="'+$("#sector_inp").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function edit_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Admin/memberlist.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="member_id" value="'+id+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function del_row(id){
          if (confirm("Confirm Delete")) {
            myform = document.createElement("form");
            $(myform).attr("action","<?=site_url("Admin/memberlist.php")?>");   
            $(myform).attr("method","post");
            $(myform).html('<input type="text" name="del_member_id" value="'+id+'">')
            document.body.appendChild(myform);
            myform.submit();
            $(myform).remove();
          }
        }
</script>
</body>
</html>
