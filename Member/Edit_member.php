<? include('../meta.php');
require_once("../model/m_user.php");
$m_user = new M_user;
if(isset($_POST['flname'])){
  $user_dat=$m_user->get_user_member($_SESSION['username']);
		$insertdata = array(
		"name" =>$_POST['flname'],
		"password" =>$_POST['password'],
		"lastname" =>$_POST['lastname'],
		"phone" =>$_POST['phone'],
		"email" =>$_POST['email'],
		"address" =>$_POST['address'],
		"sector" =>$_POST['sector']);
    if (isset($_POST['file_name'])&&$_POST['file_name']!="") {
                        //echo "in here 1 ";
       @unlink("../files/profile/".$user_dat['picture']);
                        $ext=explode(".", $_POST['file_name']);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$_SESSION['username']."_".time().".".$new_ext;
                        $file = '../files/'.$_POST['file_name'];
                        $newfile = '../files/profile/'.$new_filename;                        
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("../files/".$_POST['file_name']);
                            @unlink("../files/thumbnail/".$_POST['file_name']);
                        }else{
                            $insertdata['picture']=$new_filename;
                            @unlink("../files/".$_POST['file_name']);
                            @unlink("../files/thumbnail/".$_POST['file_name']);
                            
                        }                
            }
		
		$m_user->update_member($insertdata,$_SESSION['username']);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
            //window.open("<?echo site_url('Member/firstpage_member.php');?>","_self");            
        </script>
    <?
	}
$user_dat=$m_user->get_user_member($_SESSION['username']);
$err_msg="";
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('logout.php');?>","_self");            
        </script>
    <?
}

?>  

    <tr valign="top">
      <td width="248" height="72">
        <? include('../sidebar_logged.php');?>
      </td>
  
    <form id="Member" name="addMember" method="post" action="<?=site_url()?>Member/Edit_member.php">  
    <td width="657" rowspan="9" valign="top"><fieldset>
      <legend><h3><span style="color:#2288BB">ข้อมูลส่วนตัว</span></h3></legend>
      
      <table width="476" height="270" border="0" align="center" id="regis"  >
        <tbody>
          <tr>
            <th width="232" height="49" scope="col" align="center"><label>ชื่อผู้ใช้งาน</label>&nbsp;</th>
            <th width="234" scope="col" align="left"><label for="textfield"></label>
              <input disabled type="text" name="username" id="username" placeholder="ชื่่อผู้ใช้งาน" value="<? echo $user_dat['username'];?>" ></th>
            </tr>
          <tr>
            <td height="19" align="center"><strong>พาสเวิร์ด&nbsp;</strong></td>
            <td ><input name="password" type="password"  placeholder="รหัสผ่าน" value="<? echo $user_dat['password'];?>"></td>
            </tr>
          <tr>
            <td height="34" align="center"><strong>ชื่อ</strong></td>
            <td><input type="text" name="flname"  placeholder="ชื่อ" value="<? echo $user_dat['name'];?>"></td>
          </tr>
          <tr>
            <td height="34" align="center"><label><strong> นามสกุล</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input name="lastname" type="text" id="textfield" placeholder="นามสกุล" value="<? echo $user_dat['lastname'];?>"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>เบอร์โทรศัพท์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="tel" name="phone" id="tel" placeholder="เบอร์โทรศัพท์" value="<? echo $user_dat['phone'];?>"></td>
            </tr>
          <tr>
            <td align="center"><label><strong>อีเมลล์</strong></label>
              <strong>&nbsp;</strong></td>
            <td><input type="email" name="email" id="email" placeholder="อีเมลล์" value="<? echo $user_dat['email'];?>"></td>
          </tr>
          <tr>
            <td align="center"><strong>ที่อยู่</strong></td>
            <td><textarea name="address" id="textarea" ><? echo $user_dat['address'];?></textarea></td>
            </tr>
          <tr>
            <td align="center"><label><strong>โรงเรียน/ตำแหน่ง</strong></label>
              <strong>&nbsp;</strong></td>
            <td><p>
              <select  name="sector" id="sector"   >
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
              </script>
            </p>
              <p>&nbsp;</p></td>
            </tr>
          <tr>
            <td align="center" colspan="2">
            <!-- BOOTSTRAP STYLES-->
    <link href="<?=site_url()?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?=site_url()?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="<?=site_url()?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?=site_url()?>assets/css/custom.css" rel="stylesheet" />
            <div class="control-group">
                        <span class="btn btn-success fileinput-button">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                            <span>เลือกไฟล์</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload_oc" type="file" name="files">
                        <input id="oc_temp_f_name" name="file_name" type="hidden">
                        </span>
                        <br>
                        <br>
                        <!-- The global progress bar -->
                        <div id="progress_oc" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                    </div>
                    <div>
                      <img id="profile_pic" src="<?=site_url("files/profile/".$user_dat['picture'])?>" style="max-width: 400px;">
                    </div>
                    </td>
                    </tr>
                    <tr>
            <td align="center" colspan="2"><input type="submit" name="submit" id="submit" value="ตกลง"></td>
            </tr>
          </tbody>
      </table>
    </fieldset></td></form>
    </tr>
    
   
    <tr>
      <td height="19" colspan="2">
      
      
      
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?=site_url()?>assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?=site_url()?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?=site_url()?>assets/js/jquery.metisMenu.js"></script>
    <link rel="stylesheet" href="<?=site_url()?>css/jquery.fileupload.css">
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?=site_url()?>js/upload/vendor/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?=site_url()?>js/upload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?=site_url()?>js/upload/jquery.fileupload.js"></script>
<script type="text/javascript">
$(function() {
    'use strict';
    // for OC
    var url = '<?=site_url()?>server/php/index.php';
    $('#fileupload_oc').fileupload({
            previewThumbnail: false,
            url: url,
            dataType: 'json',
            beforeSend: function() {
                $('#progress_oc .progress-bar').css(
                    'width',
                    '10%'
                );
            },
            done: function(e, data) {
                //console.log(data);

                $.each(data.result.files, function(index, file) {
                    console.log(file);
                    if (file.error == "File is too big") {
                        alert("File is too big exceed 100 MB");
                        $("#oc_temp_f_name").val("");
                        $('#progress_oc .progress-bar').css(
                            'width',
                            '0%'
                        );
                    } else if (file.error == "Filetype not allowed") {
                        alert("Filetype not allowed xls and xlsx only");
                        $("#oc_temp_f_name").val("");
                        $('#progress_oc .progress-bar').css(
                            'width',
                            '0%'
                        );
                    } else {
                        alert("Upload Complete file " + file.name);
                        $("#oc_temp_f_name").val(file.name);
                        $("#profile_pic").attr("src","<?=site_url("files")?>/"+file.name);
                    }
                });

            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress_oc .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

});
</script>
</body>
</html>
