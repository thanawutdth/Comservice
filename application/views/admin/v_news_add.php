<?
$ci =& get_instance();
?>
<link rel="stylesheet" href="<?echo site_url();?>css/jquery.fileupload.css">
<link rel="stylesheet" href="<?echo site_url();?>css/style.css">
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
                                   <form id="submit_form" class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/news/news_edit/'.$news->id);}else{echo site_url('admin/news/news_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Title</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="title" value="">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="title" value="<?echo $news->title;?>">
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
                                                      <input class="focused datetimepicker" id="" type="text" name="date" value="<?echo $ci->m_time->unix_to_datetimepicker($news->date);?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                  <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Publish</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="checkbox" name="is_publish" value="y" >
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="checkbox" name="is_publish" value="y" <?if($news->is_publish=="y"){echo "checked";}?>>
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>   
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">Description</label><br>
                                                  <textarea class="focused" id="" type="checkbox" name="description" style="width: 450px;height: 200px;"><?if(isset($edit)){echo $news->description;}?></textarea>
                                                  
                                                </div>  
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">Thumbnail image</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload_tmb" type="file" name="files[]" >
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress_tmb" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="img_hold_parent_tmb" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                        <div class="img_hold">
                                                            <img id="file_tmp_tmb" src="<?if(isset($edit)){echo site_url('media/news/'.$news->picture_tmb);}?>" class="span10 file_tmp" width="450">
                                                            <input id="file_path_tmb" type="hidden" class="file_path" name="file_path_tmb" value="">
                                                            
                                                        </div>
                                                    
                                                </div>    
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">Main image</label>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files[]" >
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="img_hold_parent" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                        <div class="img_hold">
                                                            <img id="file_tmp" src="<?if(isset($edit)){echo site_url('media/news/'.$news->picture);}?>" class="span10 file_tmp" width="450">
                                                            <input id="file_path" type="hidden" class="file_path" name="file_path" value="">
                                                            
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


    $(document).on('click', ".img_hold .del_tmp", function(){
      cue_ele=$(this);
      $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/del_tmp_img"); ?>",
                                    data: {
                                        "file": cue_ele.parent().find("input").val(),
                                    }
                                })
                                .done(function(data) {
                                    cue_ele.parent().fadeOut(500,function(){
                                      $(this).remove();
                                    });
                                });
    });
    $(document).on('click', ".img_hold .del_pic", function(){
      cue_ele=$(this);
      $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/del_real_img"); ?>",
                                    data: {
                                        "id": cue_ele.attr("id"),
                                        "filename": cue_ele.attr("file"),
                                    }
                                })
                                .done(function(data) {
                                    cue_ele.parent().fadeOut(500,function(){
                                      $(this).remove();
                                    });
                                });
    });
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
                                $("#file_tmp").attr("alt","ไฟล์ "+file.name+" ขนาดไหญ่เกินไป");
                            }else{
                                $("#file_tmp").attr("src","<?echo site_url();?>media/temp/"+file.name);
                                $("#file_path").val(file.name);
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
            <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload_tmb').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress_tmb .progress-bar').css(
                            'width',
                             '0%'
                        );
                     },
                    done: function (e, data) {
                        //console.log(data);

                        $.each(data.result.files, function (index, file) {
                            //console.log(file);
                            if (file.error=="File is too big") {
                                $("#file_tmp_tmb").attr("alt","ไฟล์ "+file.name+" ขนาดไหญ่เกินไป");
                            }else{
                                $("#file_tmp_tmb").attr("src","<?echo site_url();?>media/temp/"+file.name);
                                $("#file_path_tmb").val(file.name);
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress_tmb .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            </script>                                         

            