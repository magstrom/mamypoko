<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/template/template.php');  
?>
<!-- Template Delete -->
<div class="modal fade" id="templateDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
     <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel">Hapus Template?</h4>
             </div>
             <div class="modal-body">
               Anda akan <strong>menghapus</strong> <strong id="show-name"></strong> dari List  ?
             </div>
             <div class="modal-footer">
                <div class="pull-right">
                   <a id="yesDeleteTemplate" href="" class="btn btn-danger">Hapus</a>
                   &nbsp;
                   <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
             </div>
       </div><!-- modal-content -->
   </div><!-- modal-dialog -->
</div>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <?php 
                  $template = getTemplate();
                  //print_r($template);echo "<br>";
                   ?>
                  <div class="row">
                     <div class="col-md-12 table-mp">
                        <a href="/view/addTemplate.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Template</a>
                        <div class="mt20"></div>
                        <?php if(isset($_GET['status'])){ ?>
                           <?php if(($_GET['status']=='success') && ($_GET['method']=='add')){ ?>
                           <div id="alert-success" class="alert no-radius alert-dismissible green-alert" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Sukses!</strong> Data berhasil dimasukkan. 
                           </div>
                           <?php } ?>
                           <?php if(($_GET['status']=='success') && ($_GET['method']=='update')){ ?>
                           <div id="alert-update" class="alert no-radius alert-dismissible blue-alert" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Sukses!</strong> Data telah terupdate. 
                           </div>
                           <?php } ?>
                           <?php if(($_GET['status']=='success') && ($_GET['method']=='delete')){ ?>
                           <div id="alert-delete" class="alert no-radius alert-dismissible blue-alert" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Sukses!</strong> Data telah terhapus. 
                           </div>
                           <?php } ?>
                           <?php if ($_GET['status']=='error'){ ?>
                           <div id="alert-error" class="alert no-radius alert-dismissible red-alert" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Terjadi kesalahan!</strong> Silakan coba kembali. 
                           </div>
                           <?php } ?>
                        <?php } ?>
                        <table class="table">
                           <thead>
                              <tr>
                                 <th width="250px">Name</th>
                                 <th>Description</th>
                                 <th width="220">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 

                              foreach ($template as $item) { ?>
                              <tr>
                                 <td><?php echo $item['name']; ?></td>
                                 <td><?php echo $item['description']; ?>.</td>
                                 <td>
                                    <a href="/view/layout.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-location-arrow"></i> Layout</a> &nbsp;
                                    <a href="/view/editTemplate.php?id=<?php echo $item['id']?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit </a> &nbsp; 
                                    <a href="#"  class="btn btn-xs btn-danger del-tb" data-name="<?php echo $item['name']?>" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash"></i> Delete </a>
                                 </td>
                              </tr>
                         <?php     } ?>
                              
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   jQuery("#alert-success").fadeTo(4000, 500).slideUp(500, function(){
       jQuery("#alert-success").alert('close');
   });
   jQuery("#alert-update").fadeTo(4000, 500).slideUp(500, function(){
       jQuery("#alert-update").alert('close');
   });
   jQuery("#alert-delete").fadeTo(4000, 500).slideUp(500, function(){
       jQuery("#alert-delete").alert('close');
   });
   jQuery("#alert-error").fadeTo(4000, 500).slideUp(500, function(){
       jQuery("#alert-error").alert('close');
   });
   $(document).on("click", ".del-tb", function() {
      $("#templateDel").modal('show');

      var idProduct = $(this).data('id');
      $("#idProduct").val(idProduct);

      var name = $(this).data('name');
      $("#show-name").text(name);

      $('#yesDeleteTemplate').attr('href', '/function/template/deleteTemplate.php?id=' + idProduct);
   });
</script>
<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>