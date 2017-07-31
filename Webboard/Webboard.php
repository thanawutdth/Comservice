<?
include('../meta.php');
date_default_timezone_set('Asia/Bangkok');
require_once("../model/m_user.php");
$m_user = new M_user;
require_once("../model/m_board.php");
$m_board = new M_board;
if(isset($_POST['title'])){
    $insertdata = array(
    "title" =>$_POST['title'],
    "message" =>$_POST['message'],
    "name" =>$_POST['name'],
    "email" =>$_POST['email'],
    "date_q" =>date("Y-m-d H:i:s"),
    "count_q" =>0,
    );
    
    $m_board->insert_post($insertdata);
    ?>
        <script type="text/javascript">
      alert("บันทึกข้อมูลเรียบร้อย");
            //window.open("<?echo site_url('Webboard/Webboard.php');?>","_self");            
        </script>
    <?
  }
$topic=$m_board->get_all_web_quiz();

?>  
  <tr align="left" valign="top">
    <td width="248" align="center"><?include('../sidebar_logged.php');?></td>
    
    <td width="743" align="center">
    <table width=456 height=59 border=2>
      <tr>
        <td width=703>
          <table width=532 align=center>
          <tr bgcolor=#6AC2EF>
          <td>รหัสกระทู้</td>
          <td>หัวข้อกระทู้</td>
          <td>ผู้ตั้งคำถาม</td>
          <td>วันที่ตั้งคำถาม</td>
          <td>จำนวนที่ตอบ</td>
          </tr>
          <?
          foreach ($topic->result as $key => $value) {
          
          ?>
          <tr bgcolor=#FFFFFF>
            <td><?=$value['id_question']?></td>
            <td><a href="<?=site_url()?>Webboard/webboard_ans.php?id_question=<?=$value['id_question']?>" ><?=$value['title']?></a></td>
            <td><?=$value['name']?></td>
            <td><?=$value['date_q']?></td>
            <td><?=$value['count_q']?></td>
          </tr>
          <?
        }
          ?>
          </table>
        </td>
      </tr>
    </table>
<form name="form1" method="post" action="<?=site_url()?>Webboard/Webboard.php">
    <table width="477" height="313" border="2">
      <tbody>
        <tr>
          <td colspan="2" align="center">ตั้งกระทู้ใหม่</td>
          </tr>
        <tr>
          <td width="52" height="21">หัวข้อกระทู้:</td>
          <td width="331"><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
          <td>รายละเอียด:</td>
          <td><textarea name="message" id="message" wrap="virtual"></textarea></td>
        </tr>
        <tr>
          <td>ชื่อผู้โพสต์:</td>
          <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
          <td>อีเมล์:</td>
          <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="200" border="2">
            <tbody>
              <tr>
                <td width="100"><input type="submit" name="submit" id="submit" value="ตั้งคำถาม"></td>
                <td width="82"><input type="button" name="button3" id="button3" value="ยกเลิก"></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></form>
    
    
    
  </tr>
  <tr>
  <td width="248" align="center" valign="top">&nbsp;</td>
  <td width="743" align="center" valign="top"><p>&nbsp;</p></td>
</tr>
<div class="banner"> </div>
</table></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
