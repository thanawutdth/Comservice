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
                                <div class="muted pull-left">Album list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar pull-right">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/gallery/gallery_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                        foreach ($album as $key => $value) {
                                          ?>

                                          <tr>
                                            <td><img src="<?=@site_url('media/gallery/'.$value->img[0]->picture)?>" width="250"></td>
                                            <td><? echo $value->name; ?></td>
                                            <td>                                                                                       
                                                    <a href="<? echo site_url('admin/gallery/gallery_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="javascript:approvol('<? echo site_url('admin/gallery/delete_album/'.$value->id)?>');" class="btn btn-danger btn-xs">ลบ</a>
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

        </script>