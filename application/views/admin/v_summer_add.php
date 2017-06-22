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
  width: 70%;
  height: 50px;
  margin-top: 10px;
}
.req_p input{
  width: 80%;
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
                                <div class="muted pull-left">Add Summer Camp </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form id="submit_form" class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/summer/summer_edit/'.$summer_camp->id);}else{echo site_url('admin/summer/summer_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">โครงการ</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="<?echo $summer_camp->name;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">ประเทศ</label>
                                                  <div class="controls">
                                                  <select class="chzn-select" id="type" name="type">
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="UK">UK</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="USA">USA</option>
                                                    <option value="Other">Other</option>
                                                  </select>
                                                  </div>
                                                  </div>
                                                  <?
                                                if (isset($edit)) {
                                                  ?>
                                                  <script type="text/javascript">
                                                    $("#type").val("<?=$summer_camp->type?>")
                                                  </script>
                                                  <?
                                                }

                                                ?>
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
                                                      <input class="focused datetimepicker" id="" type="text" name="date" value="<?echo $ci->m_time->unix_to_datetimepicker($summer_camp->date);?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">รูปตารางกิจกรรม</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload_main" type="file" name="files[]" >
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress_main" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left" style="margin-bottom:20px;">
                                                        <div class="img_hold">
                                                            <img id="file_tmp" src="<?if(isset($edit)){echo site_url('media/summer_camp/'.$summer_camp->main_picture);}?>" class="span10 file_tmp" width="450">
                                                            <input id="file_path_main" type="hidden" class="file_path_main" name="file_path_main" value="">
                                                            
                                                        </div>
                                                    
                                                </div>
                                                <?/*<div class="control-group">
                                                  <label class="control-label" for="focusedInput">ค่าใช่จ่าย</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="cost" value="">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="cost" value="<?echo $summer_camp->cost;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                
                                                </div>
                                                <div class="span12 no-margin-left" id="hiligh_hold">
                                                  <label class="control-label" for="focusedInput">Highlight</label>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success add_hiligh">Add</button>
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->hiligh as $key => $value) {
                                                        ?>
                                                          <div class="req_p ">
                                                              <button type="button" class="btn btn-danger del_hiligh">X</button>
                                                              <input class="focused" id="" type="text" name="hiligh[]" value="<?=$value->des?>">
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>
                                                  
                                                </div>    
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">อาหาร</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="food" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->food;}?></textarea>
                                                  </div>
                                                </div>*/?>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">Why</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="interest" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->interest;}?></textarea>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">ที่พัก</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="rest" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->rest;}?></textarea>
                                                  </div>
                                                </div>                                              
                                                
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">ที่พัก images</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload_rest" type="file" name="files[]" multiple>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress_rest" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left">
                                                    <div id="img_hold_parent_rest" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->rest_img as $key => $value) {
                                                        ?>
                                                          <div class="img_hold">
                                                              <button dat-id="<?=$value->id?>" type="button" class="btn btn-danger del_rest">Delete</button>
                                                              <img src="<?=site_url('media/summer_camp/'.$value->picture)?>" class="span12 file_tmp" >
                                                              <input type="hidden" class="file_path" name="file_path_rest[<?=$value->id?>]" value="__old">                       
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>                                                 

                                                    </div>
                                                  </div>
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                  <div class="span12 no-margin-left">
                                                    <label class="control-label" for="focusedInput">โรงเรียน</label>
                                                    <div class="controls">
                                                    <textarea class="focused" id="" type="checkbox" name="school" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->school;}?></textarea>
                                                    </div>
                                                  </div>     
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">โรงเรียน images</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload_school" type="file" name="files[]" multiple>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress_school" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left">
                                                    <div id="img_hold_parent_school" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->school_img as $key => $value) {
                                                        ?>
                                                          <div class="img_hold">
                                                              <button dat-id="<?=$value->id?>" type="button" class="btn btn-danger del_school">Delete</button>
                                                              <img src="<?=site_url('media/summer_camp/'.$value->picture)?>" class="span12 file_tmp" >
                                                              <input type="hidden" class="file_path" name="file_path_school[<?=$value->id?>]" value="__old">                       
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>                                                 

                                                    </div>
                                                  </div>
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                <div class="span12 no-margin-left">
                                                    <label class="control-label" for="focusedInput">หลักสูตร</label>
                                                    <div class="controls">
                                                    <textarea class="focused" id="" type="checkbox" name="subject" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->subject;}?></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                  <div class="span12 no-margin-left">
                                                    <label class="control-label" for="focusedInput">กิจกรรม</label>
                                                    <div class="controls">
                                                    <textarea class="focused" id="" type="checkbox" name="leader" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $summer_camp->leader;}?></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                  <div class="span12 no-margin-left" id="in_cost_hold">
                                                  <label class="control-label" for="focusedInput">ข้อกำหนดผู้ร่วมโครงการ</label>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success add_in_cost">Add</button>
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->incost as $key => $value) {
                                                        ?>
                                                          <div class="req_p ">
                                                              <button type="button" class="btn btn-danger del_in_cost">X</button>
                                                              <input class="focused" id="" type="text" name="in_cost[]" value="<?=$value->des?>">
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>
                                                  
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <?/*<div class="span12 no-margin-left" id="out_cost_hold">
                                                  <label class="control-label" for="focusedInput">ค่าใช้จ่ายไม่รวม</label>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success add_out_cost">Add</button>
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->outcost as $key => $value) {
                                                        ?>
                                                          <div class="req_p ">
                                                              <button type="button" class="btn btn-danger del_out_cost">X</button>
                                                              <input class="focused" id="" type="text" name="out_cost[]" value="<?=$value->des?>">
                                                          </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>
                                                  
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>*/?>
                                                <div class="span12 no-margin-left">
                                                    <label class="control-label" for="focusedInput">Program</label>
                                                  </div>     
                                                  <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">File For Download</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload_file" type="file" name="files[]" multiple>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress_file" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left">
                                                    <div id="img_hold_parent_file" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($summer_camp->download as $key => $value) {
                                                        ?>
                                                          <div class="img_hold">
                                                              <button dat-id="<?=$value->id?>" type="button" class="btn btn-danger del_file">Delete</button>
                                                              <a href="<?=site_url('media/summer_camp_file/'.$value->file)?>">Download</a>
                                                              <input type="hidden" class="file_path" name="file_path_download[<?=$value->id?>]" value="__old"> 
                                                              <label  for="focusedInput">Name</label>
                                                              <input class="focused" id="" type="text" name="download_name[<?=$value->id?>]" value="<?=$value->download_name?>">                      
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

    $( "#img_hold_parent_rest" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#img_hold_parent_rest" ).disableSelection();
    $( "#img_hold_parent_school" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#img_hold_parent_school" ).disableSelection();

  });
        $(document).on('click', ".add_hiligh", function() {
            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/summer/ajax_add_hiligh'); ?>",
                                    data: {
                                        "img_tmp": "",
                                    }
                                })
                                .done(function(data) {
                                    $("#hiligh_hold").append(data);
                                });
        });
       $(document).on('click', ".del_hiligh", function() {
            if (confirm("Confirm Delete")) {
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
       $(document).on('click', ".add_in_cost", function() {
            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/summer/ajax_in_cost'); ?>",
                                    data: {
                                        "img_tmp": "",
                                    }
                                })
                                .done(function(data) {
                                    $("#in_cost_hold").append(data);
                                });
        });
       $(document).on('click', ".del_in_cost", function() {
            if (confirm("Confirm Delete")) {
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
       $(document).on('click', ".add_out_cost", function() {
            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/summer/ajax_out_cost'); ?>",
                                    data: {
                                        "img_tmp": "",
                                    }
                                })
                                .done(function(data) {
                                    $("#out_cost_hold").append(data);
                                });
        });
       $(document).on('click', ".del_out_cost", function() {
            if (confirm("Confirm Delete")) {
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
        $(document).on('click', ".del_rest", function() {
            if (confirm("Confirm Delete")) {
                $("#img_hold_parent_rest").append('<input type="hidden"  name="del_list_rest[]" value="'+$(this).attr("dat-id")+'">');
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
        $(document).on('click', ".del_school", function() {
            if (confirm("Confirm Delete")) {
                $("#img_hold_parent_school").append('<input type="hidden"  name="del_list_school[]" value="'+$(this).attr("dat-id")+'">');
                $(this).parent().fadeOut(300, function() {
                    $(this).remove();
                });
            };
        });
        $(document).on('click', ".del_file", function() {
            if (confirm("Confirm Delete")) {
                $("#img_hold_parent_file").append('<input type="hidden"  name="del_list_file[]" value="'+$(this).attr("dat-id")+'">');
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
                $('#fileupload_main').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress_main .progress-bar').css(
                            'width',
                             '0%'
                        );
                     },
                    done: function (e, data) {
                        //console.log(data);

                        $.each(data.result.files, function (index, file) {
                            //console.log(file);
                            if (file.error=="File is too big") {
                                $("#file_tmp").attr("alt","ไฟล์ "+file.name+" ขนาดไหญ่เกินไป");
                            }else{
                                $("#file_tmp").attr("src","<?echo site_url();?>media/temp/"+file.name);
                                $("#file_path_main").val(file.name);
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress_main .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            </script>
            <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload_rest').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress_rest .progress-bar').css(
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
                                    url: "<?php echo site_url('admin/summer/ajax_add_rest'); ?>",
                                    data: {
                                        "img_tmp": file.name,
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent_rest").append(data);
                                });
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress_rest .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload_school').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress_school .progress-bar').css(
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
                                    url: "<?php echo site_url('admin/summer/ajax_add_school'); ?>",
                                    data: {
                                        "img_tmp": file.name,
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent_school").append(data);
                                });
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress_school .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            </script>

            <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload_file').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress_file .progress-bar').css(
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
                                    url: "<?php echo site_url('admin/summer/ajax_add_file'); ?>",
                                    data: {
                                        "img_tmp": file.name,
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent_file").append(data);
                                });
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress_file .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
           
            </script>
                                              

            