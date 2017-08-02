<?
include('../meta.php');
date_default_timezone_set('Asia/Bangkok');
require_once("../model/m_user.php");
$m_user = new M_user;
require_once("../model/m_board.php");
$m_board = new M_board;
$edit_board=false;
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
            window.open("<?echo site_url('Webboard/Webboard.php');?>","_self");            
        </script>
    <?
  }
<<<<<<< HEAD
  print_r($_POST);
=======
  $topic_edit=null;
if (isset($_POST['edit_id'])) {
    $topic_edit=$m_board->get_board_by_id($_POST['edit_id']);
    $edit_board=true;
  }
if (isset($_POST['id_question_edit'])) {
      $insertdata = array(
    "title" =>$_POST['title_edit'],
    "message" =>$_POST['message_edit'],
    "name" =>$_POST['name_edit'],
    "email" =>$_POST['email_edit'],
    );
      $m_board->update_post($insertdata,$_POST['id_question_edit']);
      ?>
        <script type="text/javascript">
      alert("แก้ใขข้อมูลเรียบร้อย");
            //window.open("<?echo site_url('Webboard/Webboard.php');?>","_self");            
        </script>
    <?
}    
if (isset($_POST['delete_post'])) {
  $m_board->delete_post($_POST['delete_post']);
  ?>
        <script type="text/javascript">
          alert("ลบข้อมูลเรียบร้อย");
          window.open("<?echo site_url('Webboard/Webboard.php');?>","_self");            
        </script>
    <?
}

>>>>>>> 6b546179aee9e4819920150799753101581978ed
$topic=$m_board->get_all_web_quiz();
$user_dat=$m_user->get_user_admin($_SESSION['username'],1);
if (isset($user_dat['username'])) {
  $_SESSION['user_admin']=$user_dat['username'];
}

if (isset($_POST['del_fix_id'])) {

    $m_board->get_all_web_quiz($_POST['del_fix_id']);
}
?>  
<div id="tarang" > 
  <tr align="left" valign="top">
    <td width="248" align="center"><?include('../sidebar_logged.php');?></td>
    
    <td width="743" align="center">
    <table width=456 height=59 border=0>
      <tr>
        <td width=703>
          <table width=532 align=center>
          <tr bgcolor=#6AC2EF>
          <td>รหัสกระทู้</td>
          <td>หัวข้อกระทู้</td>
          <td>ผู้ตั้งคำถาม</td>
          <td>วันที่ตั้งคำถาม</td>
          <td>จำนวนที่ตอบ</td>
<<<<<<< HEAD
           <td>ลบ:แก้ไข</td>
=======
          <?
          if (isset($_SESSION['user_admin'])&&$_SESSION['user_admin']!="") {
            ?>
            <td>Control</td>
            <?
          }
          ?>
>>>>>>> 6b546179aee9e4819920150799753101581978ed
          </tr>
          <?
 foreach ($topic->result as $key => $value) 
 {
       if (isset($_POST['id_question'])&&$_POST['id_question']==$value["id_question"]) {
     ?>
          <tr bgcolor=#FFFFFF align="center">
            <td><?=  $value['id_question']?></td>
   <td> <a href="<?=site_url()?>Webboard/webboard_ans.php?id_question=<?=$value['id_question']?>"><input type="text" id="topic"  value="<?=$value[	'title']?>"></a></td>
            <td><input type="text" id="name" value="<?=$value['name']?>"></td>
            <td><?=$value['date_q']?></td>
            <td><?=$value['count_q']?></td>
<<<<<<< HEAD
            <td><a href="javascript:save_row(<?=$value["id_question"]?>);">Update</a><br><a href="">Cancel</a></td>
             
=======
            <?
          if (isset($_SESSION['user_admin'])&&$_SESSION['user_admin']!="") {
            ?>
            <td><a href="javascript:edit_row('<?=$value['id_question']?>');">Edit</a><br><a href="javascript:del_row('<?=$value['id_question']?>');">Delete</a></td>
            <?
          }
          ?>
>>>>>>> 6b546179aee9e4819920150799753101581978ed
          </tr>
          <?
        }else {
      ?>
          <tr bgcolor=#FFFFFF align="center">
            <td><?=  $value['id_question']?></td><td><a href="<?=site_url()?>Webboard/webboard_ans.php?id_question=<?=$value[			'id_question']?>" ><?=$value['title']?></a></td>
            <td><?=$value['name']?></td>
            <td><?=$value['date_q']?></td>
            <td><?=$value['count_q']?></td>
            <td><a href="javascript:edit_row(<?=$value["id_question"]?>);">Edit</a><br><a href="javascript:del_row(<?=$value["id_question"]?>);">Delete</a>
            </td>
             
          </tr>
          
          
           <? }}?>
          
          </table></div>
           
        </td>
      </tr>
    </table>
    
    
    
<form name="form1" method="post" action="<?=site_url()?>Webboard/Webboard.php">
    <table width="513" height="313" border="0">
      <tbody>
      <?
      if ($edit_board) {
        ?>
        <tr>
          <td colspan="2" align="center">แก้ใข กระทู้</td>
          <input type="hidden" name="id_question_edit" value="<?=$topic_edit['id_question']?>"></input>
          </tr>
        <tr>
          <td width="129" height="21">หัวข้อกระทู้:</td>
          <td width="374"><input type="text" name="title_edit" id="title" value="<?=$topic_edit['title']?>"></td>
        </tr>
        <tr>
          <td>รายละเอียด:</td>
          <td><textarea name="message_edit" id="message" wrap="virtual"><?=$topic_edit['message']?></textarea></td>
        </tr>
        <tr>
          <td>ชื่อผู้โพสต์:</td>
          <td><input type="text" name="name_edit" id="name" value="<?=$topic_edit['name']?>"></td>
        </tr>
        <tr>
          <td>อีเมล์:</td>
          <td><input type="email" name="email_edit" id="email" value="<?=$topic_edit['email']?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="200" border="0">
            <tbody>
              <tr>
                <td width="100"><input type="submit" name="submit" id="submit" value="แก้ใข"></td>
                
              </tr>
            </tbody>
          </table></td>
        </tr>
        <?
      }else{
      ?>
        <tr>
          <td colspan="2" align="center">ตั้งกระทู้ใหม่</td>
          </tr>
        <tr>
          <td width="129" height="21">หัวข้อกระทู้:</td>
          <td width="374"><input type="text" name="title" id="title"></td>
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
          <td><table width="200" border="0">
            <tbody>
              <tr>
                <td width="100"><input type="submit" name="submit" id="submit" value="ตั้งกระทู้"></td>
                
              </tr>
            </tbody>
          </table></td>
        </tr>
        <?}?>
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
<script type="text/javascript">
<<<<<<< HEAD
  function save_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Webboard/Webboard.php")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="title" value="'+id+'"><input type="text" name="topic" value="'+$("#topic").val()+'"><input type="text" name="name" value="'+$("#name").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
=======
>>>>>>> 6b546179aee9e4819920150799753101581978ed
        function edit_row(id){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("Webboard/Webboard.php")?>");   
          $(myform).attr("method","post");
<<<<<<< HEAD
          $(myform).html('<input type="text" name="fix_id" value="'+id+'">')
=======
          $(myform).html('<input type="text" name="edit_id" value="'+id+'">')
>>>>>>> 6b546179aee9e4819920150799753101581978ed
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
        function del_row(id){
          if (confirm("Confirm Delete")) {
            myform = document.createElement("form");
            $(myform).attr("action","<?=site_url("Webboard/Webboard.php")?>");   
            $(myform).attr("method","post");
<<<<<<< HEAD
            $(myform).html('<input type="text" name="del_fix_id" value="'+id+'">')
=======
            $(myform).html('<input type="text" name="delete_post" value="'+id+'">')
>>>>>>> 6b546179aee9e4819920150799753101581978ed
            document.body.appendChild(myform);
            myform.submit();
            $(myform).remove();
          }
        }
</script>
</body>
</html>
