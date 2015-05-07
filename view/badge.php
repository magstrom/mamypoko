<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/badges/badges.php');  
?>

<!-- Delete Modal -->
<div class="modal fade" id="BadgesDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
         Are you sure want to delete it?
      </div>
      <div class="modal-footer">
        <a id="yesDeleteBadges" href="" class="btn btn-danger btn-sm" >Delete</a>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 table-mp">
                        <a href="/view/addBadge.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Badge</a>
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
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th width="50px">Image</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>UnLocked</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $badges =  getBadges();
                                 $badgesData = $badges['badges'];
                                 //print_r($badgesData);echo "<br>";
                                 foreach ($badgesData as $item) {      
                               ?>
                              <tr>
                                 <td><img src="<?php echo $item['image'] ?>" width="35" height="35" alt=""></td>
                                 <td><?php echo $item['name'] ?></td>
                                 <td><?php echo $item['description'] ?></td>
                                 <td><span class="tooltip-mp" data-placement="top" title="" href="" data-original-title="20 Users Locked">20</span></td>
                                 <td>
                                 <a href="/view/editBadge.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>&nbsp;
                                 <a href="#"  class="btn btn-xs btn-danger del-tb" data-name="<?php echo $item['name']?>" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash"></i> Delete </a>
                                 </td>
                              </tr>
                              <?php } ?>
                              
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
      $("#BadgesDel").modal('show');

      var idProduct = $(this).data('id');
      $("#idProduct").val(idProduct);

      var name = $(this).data('name');
      $("#show-name").text(name);

      $('#yesDeleteBadges').attr('href', '/function/badges/deleteBadges.php?id=' + idProduct);
   });
</script>
<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>