<?
$ci =& get_instance();
?>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">News list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar pull-right">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/news/news_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>Picture</th>
                                              <th>Title</th>
                                              <th>date</th>
                                              <th>Publish</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($news_list as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><img src="<?echo site_url('media/news/'.$value->picture_tmb);?>" width="250"></td>
                                                  <td><? echo $value->title; ?></td>
                                                  <td><? echo date("d M Y",$value->date); ?></td>
                                                  <td><? echo $value->is_publish; ?></td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('admin/news/news_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="javascript:approvol('<? echo site_url('admin/news/delete_news/'.$value->id)?>');" class="btn btn-danger btn-xs">ลบ</a>
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