<?
include('../meta.php');
date_default_timezone_set('Asia/Bangkok');
require_once("../model/m_user.php");
$m_user = new M_user;
require_once("../model/m_board.php");
$m_board = new M_board;
if(isset($_POST['title'])){
    $insertdata = array(
    "name" =>$_POST['title'],
    "message" =>$_POST['message'],
    "email" =>$_POST['email'],
    "date_a" =>date("Y-m-d H:i:s"),
    "id_question" =>$_GET['id_question'],
    );
    
    $m_board->insert_reply($insertdata);

    ?>
        <script type="text/javascript">
      alert("บันทึกข้อมูลเรียบร้อย");
            //window.open("<?echo site_url('Webboard/Webboard.php');?>","_self");            
        </script>
    <?
  }

$reply=$m_board->get_reply_by_board_id($_GET['id_question']);
$count_update=array("count_q"=>$reply->rowCount);
$m_board->update_post($count_update,$_GET['id_question']);
$topic=$m_board->get_board_by_id($_GET['id_question']);

?>  
  <tr align="left" valign="top">
    <td width="248" align="center"><?include('../sidebar_logged.php');?></td>
    <td width="50px;"></td>
    <td>
  
    <form name="form1" method="post" action="<?=site_url()?>Webboard/Webboard_ans.php?id_question=<?=$_GET['id_question']?>">
    <table width="100%" height="ฟีะน" border="2">
      <tbody>
        <tr>
          <td colspan="2">
            <h2><?=$topic['title']?></h2>
            <p>E-Mail: <?=$topic['email']?> Name: <?=$topic['name']?> Date: <?=$topic['date_q']?></p>
            <br>
            <p style="font-size: 26px;"><?=$topic['message']?></p>
            <br>
          </td>
        </tr>
        <?
        foreach ($reply->result as $key => $value) {
          ?>
          <tr>
          <td colspan="2">
            <p>E-Mail: <?=$value['email']?> Name: <?=$value['name']?> Date: <?=$value['date_a']?></p>
            <br>
            <p><?=$value['message']?></p>
            <br>
          </td>
        </tr>
          <?
        }
        ?>
        <tr>
          <td colspan="2" align="center">แสดงความคิดเห็น</td>
          </tr>
        <tr>
          <td width="52" height="21">ชื่อผู้ตอบ :</td>
          <td width="331"><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
          <td>รายละเอียด:</td>
          <td><textarea name="message" id="message" wrap="virtual"></textarea></td>
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
                <td width="100"><input type="submit" name="button" id="button" value="ตั้งคำถาม"></td>
                <td width="82"><input type="button" name="button3" id="button3" value="ยกเลิก"></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table>
  </form>
  </td>
  </tr>




</tbody>
</table></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
