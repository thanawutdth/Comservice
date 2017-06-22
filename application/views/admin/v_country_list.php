<?
$ci =& get_instance();
?>
<style type="text/css">
  .ui-state-highlight{
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
                                <div class="muted pull-left">Country list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar pull-right">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/service/country_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>Picture</th>
                                              <th>Name</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="t_sort"> 
                                        <?
                                        foreach ($country as $key => $value) {
                                          ?>
                                          <tr>
                                            <td><img src="<?=site_url('media/country/'.$value->picture)?>" width="250"></td>
                                            <td><? echo $value->name; ?></td>
                                            <td>     <input type="hidden" name="sort[]" value="<?=$value->id?>">                                                                                      
                                                    <a href="<? echo site_url('admin/service/country_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="javascript:approvol('<? echo site_url('admin/service/delete_country/'.$value->id)?>');" class="btn btn-danger btn-xs">ลบ</a>
                                                  </td>
                                          </tr>
                                          <?
                                        }
                                        ?>                                                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script type="text/javascript">
          function approvol(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }
        $( "#t_sort" ).sortable({
          placeholder: "ui-state-highlight",
          update: function( event, ui ) {
            var sort=$("input[name='sort[]']").serialize();
            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url('admin/service/sort_country'); ?>",
                                    data: sort+""
                                })
                                .done(function(data) {
                                    
                                });
          }
        });

        </script>