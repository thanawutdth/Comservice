<? include('meta_admin.php');
require_once("../model/m_user.php");
$m_user = new M_user;
if(isset($_POST['name'])){
<<<<<<< HEAD
=======
  $user_dat=$m_user->get_user_admin($_SESSION['username']);
>>>>>>> 6b546179aee9e4819920150799753101581978ed
		$insertdata = array(
		//"username" =>$_POST['username'],
		"password" =>$_POST['password'],
		"name" =>$_POST['name'],
		"lastname" =>$_POST['lastname'],
		"phone" =>$_POST['phone'],
		"email" =>$_POST['email']);
<<<<<<< HEAD
		
=======
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
>>>>>>> 6b546179aee9e4819920150799753101581978ed
		$m_user->update_admin($insertdata,$_SESSION['username']);
		?>
        <script type="text/javascript">
			alert("บันทึกข้อมูลเรียบร้อย");
           // window.open("<?echo site_url('Admin/edit_admin.php');?>","_self");            
        </script>
    <?
	}
	print_r ($_POST);
$user_dat=$m_user->get_user_admin($_SESSION['username']);
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
    <tr>
      <td width="248">
  
<? include("sidebar_admin.php");?>
        </td>
 
  <form id="Member" name="addMember" method="post" action="<?=site_url()?>Admin/edit_admin.php">  
    <td width="657" rowspan="9" valign="top"><fieldset>
      <legend><h3><span style="color:#2288BB">ข้อมูลส่วนตัว</span></h3></legend>
      
      <p>&nbsp;</p>
      <table width="200" height="121" border="2" align="center">
        <tbody>
          <tr>
            <td height="73"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <p>&nbsp;</p>
      <table width="476" height="270" border="0" align="center" id="regis"  >
        <tbody>
          <tr>
            <th width="232" height="49" scope="col" align="center"><label>ชื่อผู้ใช้งาน</label>&nbsp;</th>
            <th width="234" scope="col" align="left"><label for="textfield"></label>
              <input  type="text" name="username" id="username" placeholder="ชื่่อผู้ใช้งาน" value="<? echo $user_dat['username'];?>" ></th>
            </tr>
          <tr>
            <td height="19" align="center"><strong>พาสเวิร์ด&nbsp;</strong></td>
            <td ><input name="password" type="password"  placeholder="รหัสผ่าน" value="<? echo $user_dat['password'];?>"></td>
            </tr>
          <tr>
            <td height="34" align="center"><strong>ชื่อ</strong></td>
            <td><input type="text" name="name"  placeholder="ชื่อ" value="<? echo $user_dat['name'];?>"></td>
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
            <td align="center">&nbsp;</td>
            <td align="center"><input type="submit" name="submit" id="submit" value="Submit"></td>
          </tr>
          </tbody>
      </table>
    </fieldset></td></form>
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