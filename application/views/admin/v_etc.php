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
  width: 300px;
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
                                <div class="muted pull-left">Etc </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form id="submit_form" class="form-horizontal" method="post" action="<?=site_url('admin/etc')?>">
                                        <fieldset>                                         
                                                
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">WHAT WE DO</label>
                                                  <div class="controls">
                                                  <textarea class="focused" id="" type="checkbox" name="what" style="width: 450px;height: 200px;"><?=$etc->what?></textarea>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Facebook</label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="fb" value="<?echo $etc->fb;?>">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Twister</label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="tw" value="<?echo $etc->tw;?>">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Instagram</label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="ig" value="<?echo $etc->ig;?>">
                                                  </div>
                                                </div>                                                                                         
                                                
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="focusedInput">Home Slider</label>&nbsp;&nbsp;&nbsp;
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
                                                      foreach ($etc->img as $key => $value) {
                                                        ?>
                                                          <div class="img_hold">
                                                              <button dat-id="<?=$value->id?>" type="button" class="btn btn-danger del_rest">Delete</button>
                                                              <img src="<?=site_url('media/etc/'.$value->picture)?>" class="span12 file_tmp" >
                                                              <input type="hidden" class="file_path" name="file_path_rest[<?=$value->id?>]" value="__old">
                                                              <label  for="focusedInput">Link</label>
                                                              <input class="focused" id="" type="text" name="link[<?=$value->id?>]" value="<?=$value->link?>">                       
                                                          </div>
                                                        <?
                                                      }
                                                    ?>                                                 

                                                    </div>
                                                  </div>
                                                  <div class="span12 no-margin-left">
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

  });
       
        $(document).on('click', ".del_rest", function() {
            if (confirm("Confirm Delete")) {
                $("#img_hold_parent_rest").append('<input type="hidden"  name="del_list_rest[]" value="'+$(this).attr("dat-id")+'">');
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
                                    url: "<?php echo site_url('admin/etc/ajax_add_rest'); ?>",
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
            </script>
                                              

            