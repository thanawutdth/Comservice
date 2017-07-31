<?
include('../meta.php');
?>  


    <tr align="left" valign="top">
      <td height="253" align="left"><div id="login">
<a href="<?=site_url()?>Member/firstpage_member.php"><h1>Computer Service</h1> </a>  
 

      <a href="<?=site_url()?>Member/Edit_member.php"> <input type="button" name="button2" id="button2" value="แก้ไขข้อมูลส่วนตัว" ></a>
      <a href="<?=site_url()?>Member/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์" ></a>
      <a href="<?=site_url()?>Member/listrepair.php"><input type="button" name="button5" id="button5" value="รายการแจ้งซ่อม"></a>
      <a href="<?=site_url()?>Member/Webboard.php"><input type="button" name="button6" id="button6" value="กระทู้ ถาม-ตอบ"> </a>
      <a href="<?=site_url()?>Member/stat.php"><input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม"></a>
	  <a href="<?=site_url()?>Member/download.php"><input type="button" name="button9" id="button9" value="ดาวน์โหลด"></a>
      <a href="<?=site_url()?>Member/Evaluation.php"><input type="button" name="button3" id="button3" value="ประเมิน"></a>
      <a href="<?=site_url()?>Member/contact.php"><input type="button" name="button4" id="button4" value="ติดต่อเรา"> </a>
        
      </div></td>
      <td width="655" align="center" valign="top">&nbsp;<table width="612" height="558" border="0">
        <tbody>
          <tr style="font-size: 16px">
            <td colspan="5" align="center" bgcolor="#D8D1D1"><strong>แบบประเมินความพึงพอใจ</strong></td>
            </tr>
          <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="font-size: 18px"><strong>ที่</strong></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="font-size: 18px"><strong>รายการ</strong></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="font-size: 18px"><strong>มาก</strong></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="font-size: 18px"><strong>ปานกลาง</strong></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="font-size: 18px">น้อย</td>
          </tr>
          <tr>
            <td width="25" align="center" style="font-size: 18px"><strong>1.</strong></td>
            <td width="334" align="left" style="font-size: 18px"><strong>ความสะดวกในการใช้คำสั่งต่างๆส่วนของเมนู</strong></td>
            <td width="69" align="center" style="font-size: 18px"><input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_0"></td>
            <td width="81" align="center" style="font-size: 18px"><input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_1"></td>
            <td width="81" align="center" style="font-size: 18px"><input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_2"></td>
          </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>2.</strong></td>
            <td align="left" style="font-size: 18px"><strong>การแจ้งซ่อมสะดวกและรวดเร็วมากขึ้น</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup2" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup2" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup2" id="radio4" value="radio">
            </strong></td>
          </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>3.</strong></td>
            <td align="left" style="font-size: 18px"><strong>การทำงานทีมช่างรวดเร็ว</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup3" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup3" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup3" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>4.</strong></td>
            <td align="left" style="font-size: 18px"><strong>เข้าถึงข่าวสารภายในองค์กรได้รวดเร็ว</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup4" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup4" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup4" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>5.</strong></td>
            <td align="left" style="font-size: 18px"><strong>ตรงกับความต้องการของผู้ใช้งาน</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup5" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup5" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup5" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>6.</strong></td>
            <td align="left" style="font-size: 18px"><strong>ความถูกในการ เพิ่ม ยกเลิก แก้ไข ข้อมูล ต่างๆ</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup6" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup6" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup6" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>7.</strong></td>
            <td align="left" style="font-size: 18px"><strong>ความถูกต้องของข้อมูลและการแจ้งซ่อม</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup7" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup7" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup7" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>8.</strong></td>
            <td align="left" style="font-size: 18px"><strong>ความครอบคลุมการใช้งานของเว็บไซต์ที่สร้างกับการใช้งานจ</strong>ริง</td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup8" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup8" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup8" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>9.</strong></td>
            <td align="left" style="font-size: 18px"><strong>การป้องกันข้อผิดพลาดที่อาจเกิดขึ้น</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup9" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup9" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup9" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td align="center" style="font-size: 18px"><strong>10.</strong></td>
            <td align="left" style="font-size: 18px"><strong>ความน่าเชื่อถือของเว็บไซต์</strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup10" id="radio6" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup10" id="radio5" value="radio">
            </strong></td>
            <td align="center" style="font-size: 18px"><strong>
              <input type="radio" name="RadioGroup10" id="radio4" value="radio">
            </strong></td>
            </tr>
          <tr>
            <td colspan="5" align="center" bgcolor="#CDCDCD">&nbsp;</td>
            </tr>
          <tr>
            <td height="50" colspan="3">&nbsp;</td>
            <td colspan="2"><input type="button" name="button" id="button" value="ส่งแบบประเมืน"></td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    
    <div class="banner">
        <tr>
          
        </tr>
    </div>
    
    
    <tr>
      <td height="19" colspan="2">&nbsp;</td>
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
