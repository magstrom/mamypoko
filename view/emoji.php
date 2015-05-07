<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/badges/badges.php');
   require_once(getFunctionPath() . '/emoji/emoji.php');  
?>
<!-- Delete Modal -->
<div class="modal fade" id="deleteEmoji" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body cmedsi-ic">
       Anda akan <strong>menghapus</strong> <strong id="show-name"></strong> dari List  ?
      </div>
      <div class="modal-footer">
        <a id="yesDeleteEmoji" href="" class="btn btn-danger btn-sm" >Delete</a>
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
                        <a href="/view/addEmoji.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Emoji</a>
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
                                 <th width="100px">Image</th>
                                 <th width="50px">ID</th>
                                 <th width="60">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $badges =  getBadges();
                                 $emojiData =  getEmoji();
                                 $badgesData = $badges['badges'];
                                 //print_r($emojiData);echo "<br>";
                                 foreach ($emojiData as $item) {      
                              ?>
                              <tr>
                                 <td><img src="<?php echo $item['image'] ?>" width="50" height="50" alt=""></td>
                                 <td><?php echo $item['id'] ?></td>
                                 <td>
                                    <a href="/view/editEmoji.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a> &nbsp;
                                    <a href="#" class="del-tb btn btn-xs btn-danger del-tb"   data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash"></i> Delete</a>
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
      $("#deleteEmoji").modal('show');

      var idProduct = $(this).data('id');
      $("#idProduct").val(idProduct);
      $("#show-name").text(idProduct);
      //$("#show-group").val(idProduct);

      $('#yesDeleteEmoji').attr('href', '/function/emoji/deleteEmoji.php?id=' +idProduct);
   });
</script>
<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>