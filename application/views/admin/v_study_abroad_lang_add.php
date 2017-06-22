<?
$ci =& get_instance();
?>
<link rel="stylesheet" href="<?echo site_url();?>css/jquery.fileupload.css">
<script src="<?echo site_url();?>js/ckeditor/ckeditor.js"></script> 
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
.img_hold{
  position: relative;
  display: inline-block;
  margin:10px;
}
.img_hold button{
  position: absolute;
  top: 0px;
  right: 0px;
}
.req_p{
  position: relative;
  width: 250px;
  height: 50px;
  margin-top: 10px;
}
.del_req{
  position: absolute;
  top: 0px;
  right: 0px;
}
.ui-state-highlight{
  position: relative;
  display: inline-block;
  margin:10px;
  width: 150px;
  height: 150px;
}
</style>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add News </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form id="submit_form" class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/service/study_abroad_lang_edit/'.$study_abroad_lang->id);}else{echo site_url('admin/service/study_abroad_lang_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Name</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="<?echo $study_abroad_lang->name;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Date</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused datetimepicker" id="" type="text" name="date" value="">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused datetimepicker" id="" type="text" name="date" value="<?echo $ci->m_time->unix_to_datetimepicker($study_abroad_lang->date);?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">ประเทศ</label>
                                                  <div class="controls">
                                                  <select class="chzn-select" id="country_id" name="country_id">
                                                    <?
                                                    foreach ($country as $key => $value) {
                                                      ?>
                                                      <option value="<?=$value->id?>"><?=$value->name?></option>
                                                      <?
                                                    }
                                                    ?>
                                                  </select>
                                                  </div>
                                                  
                                                </div>
                                                <?
                                                if (isset($edit)) {
                                                  ?>
                                                  <script type="text/javascript">
                                                    $("#country_id").val("<?=$study_abroad_lang->country_id?>")
                                                  </script>
                                                  <?
                                                }

                                                ?>
                                                
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">ระดับ</label>
                                                  <div class="controls">
                                                  <select class="chzn-select" id="rank" name="rank">
                                                    <option value="โรงเรียน">โรงเรียน</option>
                                                    <option value="สถาบันภาษา">สถาบันภาษา</option>
                                                    <option value="มหาวิทยาลัย">มหาวิทยาลัย</option>
                                                  </select>
                                                  </div>
                                                  <?
                                                if (isset($edit)) {
                                                  ?>
                                                  <script type="text/javascript">
                                                    $("#rank").val("<?=$study_abroad_lang->rank?>")
                                                  </script>
                                                  <?
                                                }

                                                ?>
                                                  
                                                </div>  
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">Why Choose</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="why" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $study_abroad_lang->why;}?></textarea>
                                                  </div>
                                                  
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">สถานที่ตั้ง</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="location" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $study_abroad_lang->location;}?></textarea>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">หลักสูตรการเรียน</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="subject" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $study_abroad_lang->subject;}?></textarea>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left" id="req">
                                                  <label class="control-label" for="focusedInput">เงื่อนไขการเข้าเรียน</label>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success add_req">Add</button>
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($study_abroad_lang->req as $key => $value) {
                                                        ?>
                                                          <div class="req_p ">
                                                              <button type="button" class="btn btn-danger del_req">X</button>
                                                              <input class="focused" id="" type="text" name="des[]" value="<?=$value->des?>">
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>
                                                  
                                                </div>
                                                
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">Slider images</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files[]" multiple>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left">
                                                    <div id="img_hold_parent" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($study_abroad_lang->img as $key => $value) {
                                                        ?>
                                                          <div class="img_hold">
                                                              <button dat-id="<?=$value->id?>" type="button" class="btn btn-danger del_con">Delete</button>
                                                              <img src="<?=site_url('media/study_abroad_lang/'.$value->picture)?>" class="span12 file_tmp" >
                                                              <input type="hidden" class="file_path" name="file_path[<?=$value->id?>]" value="__old">                       
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>                                                 

                                                    </div>
                                                  </div>     
                                                                                      
                                                <div class="control-group">
                                                  <button type="button" class="btn btn-primary send_form">บันทึก</button>
                                                </div>
                                        </fieldset>
                                       </form>  
                                      
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
        </div>
        <!--/.fluid-container-->
<script type="text/javascript">
        $(function() {
          $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy"
    });
    $('.datetimepicker').datetimepicker();
    $(".chzn-select").chosen({
        width: "75%"
    });
               $(document).on('click', ".send_form", function(){
                 $("#content_input").val($("#content_field").html());
                 //console.log($("#content_input").val());
                   document.getElementById('submit_form').submit();
               });

    $( "#img_hold_parent" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#img_hold_parent" ).disableSelection();

  });
        $(document).on('click', ".add_req", function() {
            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/service/ajax_add_req'); ?>",
                                    data: {
                                        "img_tmp": "",
                                    }
                                })
                                .done(function(data) {
                                    $("#req").append(data);
                                });
        });
        $(document).on('click', ".del_req", function() {
            if (confirm("Confirm Delete")) {
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
        $(document).on('click', ".del_con", function() {
            if (confirm("Confirm Delete")) {
                $("#img_hold_parent").append('<input type="hidden"  name="del_list[]" value="'+$(this).attr("dat-id")+'">');
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
        </script>
 <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
            <script src="<?echo site_url();?>js/upload/vendor/jquery.ui.widget.js"></script>
            <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
            <script src="<?echo site_url();?>js/upload/jquery.iframe-transport.js"></script>
            <!-- The basic File Upload plugin -->
            <script src="<?echo site_url();?>js/upload/jquery.fileupload.js"></script>
            <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress .progress-bar').css(
                            'width',
                             '0%'
                        );
                     },
                    done: function (e, data) {
                        //console.log(data);

                        $.each(data.result.files, function (index, file) {
                            //console.log(file);
                            if (file.error=="File is too big") {
                                //$("#file_tmp").attr("alt","ไฟล์ "+file.name+" ขนาดไหญ่เกินไป");
                                alert("ไฟล์ "+file.name+" ขนาดไหญ่เกินไป");
                            }else{
                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/service/ajax_add_abroad_img'); ?>",
                                    data: {
                                        "img_tmp": file.name,
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent").append(data);
                                });
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            </script>
                                              

            