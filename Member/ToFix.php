<?
include('../meta.php');
require_once("../model/m_user.php");
require_once("../model/m_fix.php");
$m_user = new M_user;
$m_fix = new M_fix;


$user_dat=$m_user->get_user_member($_SESSION['username']);
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('../logout.php');?>","_self");            
        </script>
    <?
}

if(isset($_POST['detail'])){
		$insertdata = array(
		"name" =>$user_dat['name'],
		"lastname" =>$user_dat['lastname'],
		"date" =>$_POST['date'],
		"sector" =>$user_dat['sector'],
		"type" =>$_POST['type'],
		"detail" =>$_POST['detail'],
		"phone" =>$user_dat['phone'],
		"fixuser" =>$_SESSION['username']);
		
		$m_fix->insert_fix($insertdata);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
         window.open("<?echo site_url('Member/listrepair.php');?>","_self");            
        </script>
    <?
	}
?>  

        <tr align="left" valign="top">
          <td height="239" align="center" valign="top"><?include('../sidebar_logged.php');?></td>
          <td width="697" rowspan="2" align="center" valign="top">
          
            <form id="Fix" name="addFixr" method="post" action="<?=site_url()?>Member/ToFix.php">
         <div ><table width="468" height="502" border="0" align="center"   >
             <tbody >
               <tr >
                 <td width="148" height="46" align="center" valign="middle"><p><strong>ชื่อ</strong></p></td>
                 <td width="347" align="left" valign="middle" scope="col"><input type="text" name="name" id="textfield" value="<? echo $user_dat['name']?>" disabled></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>นามสกุล</strong></p></td>
                 <td align="left" valign="middle"><input type="text" name="lastname" id="textfield2" value="<? echo $user_dat['lastname']?>" disabled></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>เบอร์โทรศัพท์</strong></p></td>
                 <td align="left" valign="middle"><input type="tel" name="phone" id="tel" value="<? echo $user_dat['phone']?>" disabled ></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>หน่วยงาน</strong></td>
                 <td align="left" valign="middle"><select  name="sector" id="sector" disabled  >
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
			  $("#sector").val("<? echo $user_dat['sector']?>");
              </script></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>วันที่</strong></td>
                 <td align="left" valign="middle"><p>
                   <input type="date" name="date" id="date">
                 </p>
                   
                     
                   </td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><p><strong>ชนิด</strong></p></td>
                 <td align="left" valign="middle"><div id="aaa">
                   <select name="type" id="select">
                     <option value="เลือกชนิดอุปกรณ์">เลือกชนิดอุปกรณ์</option>
                     <option value="คอมพิวเตอร์ pc">คอมพิวเตอร์ pc</option>
                     <option value="คอมพิวเตอร์โน๊ตบุ๊ค">คอมพิวเตอร์โน๊ตบุ๊ค</option>
                     <option value="เครื่องปริ้นเตอร์">เครื่องปริ้นเตอร์</option>
                   </select>
                 </div></td>
               </tr>
               <tr>
                 <td height="52" colspan="2" align="left" valign="top"><table width="490" border="0">
                   <tbody>
                     <tr>
                       <td width="143" height="46" align="center"><strong>ปัญหา</strong></td>
                       <td width="337"><textarea name="detail" id="textarea2" ></textarea></td>
                     </tr>
                   </tbody>
                 </table></td>
               </tr>
               <tr>
                 <td height="134" colspan="2" valign="top"><p><strong> &nbsp;
                   </strong></p>
                   <table width="380" border="0">
                     <tbody>
                       <tr>
                         <td width="233">&nbsp;</td>
                         <td width="252"><strong>
                           <input type="submit" name="submit" id="submit" value="แจ้งซ่อม">
                         </strong></td>
                       </tr>
                     </tbody>
                   </table>
                 <p>&nbsp;</p></td>
               </tr>
             </tbody>
           </table>
         </div> </form>
         </td>
        </tr>
        <tr>
          <td width="248" >&nbsp;</td>
        </tr>
        <tr>
          <td height="19" colspan="2">&nbsp;</td>
        </tr>
      </tbody>
      <tbody>
      </tbody>
      <tbody>
      </tbody>
    </table></th>
  </tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
