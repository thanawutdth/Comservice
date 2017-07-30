<?
include('../meta.php');
?>  

        <tr align="left" valign="top">
          <td height="239" align="center" valign="top"><?include('../sidebar_logged.php');?></td>
          <td width="697" rowspan="2" align="center" valign="top">
          
            <form id="Fix" name="addFixr" method="post" action="/project2/addFix.php">
         <div ><table width="468" height="502" border="0" align="center"   >
             <tbody >
               <tr >
                 <td width="148" height="46" align="center" valign="middle"><p><strong>ชื่อ</strong></p></td>
                 <td width="347" align="left" valign="middle" scope="col"><input type="text" name="name" id="textfield"></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>นามสกุล</strong></p></td>
                 <td align="left" valign="middle"><input type="text" name="lastname" id="textfield2"></td>
               </tr>
               <tr>
                 <td height="46" align="center" valign="middle"><p><strong>วันที่</strong></p></td>
                 <td align="left" valign="middle"><input type="date" name="date" id="date"></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>หน่วยงาน</strong></td>
                 <td align="left" valign="middle"><select name="building" id="select2">
                   <option>--เลือกหน่วยงาน--</option>
                   <option>อบจ.มค.</option>
                   <option>โรงเรียนเมืองเตาวิทยาคม</option>
                   <option>โรงเรียนท่าขอนยางพิทยาคม</option>
                   <option>โรงเรียนหนองบัวปิยนิมิตร</option>
                   <option>โรงเรียนมะค่าพิทยาคม</option>
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
                   <option>โรงเรียนเสือโก้กวิทยาสรรค์</option>
                   <option>โรงเรียนเวียงสะอาดพิทยาคม</option>
                   <option>โรงเรียนงัวบาวิทยาคม</option>
                   <option>โรงเรียนศรีสุขพิทยาคม</option>
                   <option>โรงเรียนหัวเรือพิทยาคม</option>
                 </select></td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><strong>ชนิด</strong></td>
                 <td align="left" valign="middle"><p>
                   <select name="type" id="select">
                     <option>เลือกชนิดอุปกรณ์</option>
                     <option>เครื่องปริ้น</option>
                     <option>หน้าจอ</option>
                     <option>เมาส์</option>
                     <option>คีย์บอร์ด</option>
                   </select>
                 </p>
                   
                     
                   </td>
               </tr>
               <tr>
                 <td height="24" align="center" valign="middle"><p><strong>ปัญหา</strong></p></td>
                 <td align="left" valign="middle"><div id="aaa"><textarea name="detail" id="textarea2" ></textarea></div></td>
               </tr>
               <tr>
                 <td height="52" colspan="2" align="left" valign="top"><table width="490" border="0">
                   <tbody>
                     <tr>
                       <td width="143" height="46" align="center"><strong>เบอร์โทรศัพท์</strong></td>
                       <td width="337"><input type="tel" name="phone" id="tel"></td>
                     </tr>
                   </tbody>
                 </table></td>
               </tr>
               <tr>
                 <td height="134" colspan="2" valign="top"><p><strong> &nbsp;
                   </strong></p>
                   <table width="503" border="2">
                     <tbody>
                       <tr>
                         <td width="233"><strong>
                           <input type="submit" name="submit" id="submit" value="แจ้งซ่อม">
                         </strong></td>
                         <td width="252"><input type="reset" name="reset" id="reset" value="Reset"></td>
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
