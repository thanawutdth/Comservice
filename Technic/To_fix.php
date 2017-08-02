<? include('meta_technic.php');
require_once("../model/m_user.php");
require_once("../model/m_fix.php");
$m_user = new M_user;
$m_fix = new M_fix;


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

if(isset($_POST['detail'])){
		$insertdata = array(
		"name" =>$user_dat['name'],
		"lastname" =>$user_dat['lastname'],
		"date" =>$_POST['date'],
		"sector" =>$_POST['sector'],
		"type" =>$_POST['type'],
		"detail" =>$_POST['detail'],
		"phone" =>$user_dat['phone'],
		"fixuser" =>$_SESSION['username']);
		
		$m_fix->insert_fix($insertdata);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
         window.open("<?echo site_url('Technic/list_repair.php');?>","_self");            
        </script>
    <?
	}
?>  
        <tr align="left" valign="top">
          <td height="239" align="center" valign="top">
		  <? include("sidebar_technic.php");?>
          </td>
          
          <td width="697" rowspan="2" align="center" valign="top">
          
            <form id="Fix" name="addFixr" method="post" action="<?=site_url()?>Technic/To_fix.php">
         <div ><table width="468" height="502" border="0" align="center"   >
             <tbody >
               <tr >
                 <td width="148" height="46" align="center" valign="middle"><p><strong>ชื่อ</strong></p></td>
                 <td width="347" align="left" valign="middle" scope="col"><input type="text" name="name" id="name" value="<? echo $user_dat['name']?>" disabled></td>
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
                 <td align="left" valign="middle"><select  name="sector" id="sector"   >
                <option value="องค์การบริหารส่วนจังหวัดมหาสารคาม" selected="selected">องค์การบริหารส่วนจังหวัดมหาสารคาม</option>
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
                       <td width="178" height="46" align="center"><strong>ปัญหา</strong></td>
                       <td width="302"><textarea name="detail" id="textarea2" ></textarea></td>
                     </tr>
                   </tbody>
                 </table></td>
               </tr>
               <tr>
                 <td height="134" colspan="2" valign="top"><p><strong> &nbsp;
                   </strong></p>
                   <table width="604" height="32" border="0">
                     <tbody>
                       <tr>
                         <td width="198">&nbsp;</td>
                         <td width="289"><strong>
                           <input type="submit" name="submit" id="submit" value="แจ้งซ่อม">
                         </strong></td>
                         <td width="93">&nbsp;</td>
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
