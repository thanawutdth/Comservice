<?
$ci =& get_instance();
?>
<style type="text/css">
  .ui-state-highlight{
  height: 150px;
}
.row{
  margin-right: 0px;
}
.no-margin-left{margin-left: 0px;}
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
                                <div class="table-toolbar pull-right">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/summer/summer_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                <div class="span12 no-margin-left">
                                   
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>โครงการ</th>
                                              <th>ประเทศ</th>
                                              <th>วันที่</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="t_sort"> 
                                        <?
                                            foreach ($summer_camp as $key => $value) {
                                             ?>
                                             <tr>
                                               <td><? echo $value->name; ?></td>
                                               <td><? echo $value->type; ?></td>
                                               <td><? echo date("d M Y",$value->date); ?></td>
                                               <td>                                                                                           
                                                    <a href="<? echo site_url('admin/summer/summer_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="javascript:approvol('<? echo site_url('admin/summer/delete_summer_camp/'.$value->id)?>');" class="btn btn-danger btn-xs">ลบ</a>
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