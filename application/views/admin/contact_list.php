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
                                <div class="muted pull-left">Contact list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>Topic</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="t_sort"> 
                                        <?
                                        foreach ($contact_list as $key => $value) {
                                          ?>
                                          <tr>
                                            <td><?=$value->topic?></td>
                                            <td><? echo $value->prefix." ".$value->name; ?></td>
                                            <td><?=$value->Email?></td>
                                            <td><?=$value->Phone?></td>
                                            <td>                                                                                           
                                                    <a href="javascript:read_contact('<?=$value->id?>');" class="btn btn-info btn-xs">View</a>
                                                    <a href="javascript:approvol('<? echo site_url('admin/contact/delete_contact/'.$value->id)?>');" class="btn btn-danger btn-xs">ลบ</a>
                                                  </td>
                                          </tr>
                                          <?
                                        }
                                        ?>                                                                      
                                        </tbody>
                                    </table>
                                </div>
                                <div class="span6">
                                  <p id="text_hold">Read here</p>
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
       function read_contact(id) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo site_url('admin/contact/read'); ?>",
                    data: {
                        "id": id,
                    }
                })
                .done(function(data) {
                  $("#text_hold").html(data);
                });
        }

        </script>