<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/stickerGroup/stickerGroup.php');
   require_once(getFunctionPath() . '/sticker/sticker.php'); 
?>
<!-- Showing Sticker Modal -->
<div class="modal fade" id="showStickerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="stickerModalHeader">
           <img id="show-image" width="35" height="35" alt="" style="float:left; margin-right:10px;">
           <h4><span id="showtitle"></span></h4> 
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-body">
        <div class="stickerModalBody">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
           <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Sticker Delete -->
<div class="modal fade" id="stickerDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
     <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel">Hapus Inventory dari List ?</h4>
             </div>
             <div class="modal-body cmedsi-ic">
               Anda akan <strong>menghapus</strong> <strong id="show-name"></strong> dari List  ?
             </div>
             <div class="modal-footer">
                <div class="pull-right">
                   <a id="yesDeleteSticker" href="" class="btn btn-danger">Hapus</a>
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
                  <div class="row">
                     <div class="col-md-12 table-mp">
                        <a href="/view/addStickerGroup.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Sticker Group</a>
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
                                 <th>Sticker</th>
                                 <th width="210">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                $sticker = getStickerGroup();
                                //print_r($sticker);echo "<br>";

                              foreach ($sticker as $item) { 
                                //print_r($item['id']);echo "<br>";
                                //print_r($item);echo "<br>";
                                $idSticker = $item['id'];
                                $detail = getSticker($idSticker);
                                //print_r($detail);echo "<br>";
                                $jumlahSticker = count($detail);
                                foreach ($detail as $part) {
                                  $stickerData[] = $part['url']; 
                                }
                                //print_r($stickerData);echo "<br>";
                             ?>
                              <tr>
                                 <td><img src="<?php echo $item['image']?>" width="35" height="35" alt=""></td>
                                 <td><?php echo $item['name']?></td>
                                 <td><?php echo $jumlahSticker ?></td>
                                 <td><a href="/view/sticker.php?id=<?php echo $item['id'] ?>" data-sticker="<?php echo $stickerData ?>" data-logo="<?php echo $item['image'] ?>" data-title="<?php echo $item['name']?>" class="btn btn-xs btn-success"><i class="fa fa-location-arrow"></i> View</a> &nbsp; <a href="/view/editStickerGroup.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit </a>&nbsp; <a href="#"  class="btn btn-xs btn-danger del-tb" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash"></i> Delete </a></td>
                              </tr>
                              <?php     } ?>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div> <!-- .container -->
<?php
   require_once(getTemplatePath() . '/footer.php');
      } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>
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
      $("#stickerDel").modal('show');

      var idProduct = $(this).data('id');
      $("#idProduct").val(idProduct);

      var name = $(this).data('name');
      $("#show-name").text(name);

      $('#yesDeleteSticker').attr('href', '/function/stickerGroup/deleteStickerGroup.php?id=' + idProduct);
   });
   $(document).on("click", ".show-tb", function() {
      $("#showStickerModal").modal('show');

      var title = $(this).data('title');
      $("#showtitle").text(title);

      var image = $(this).data('logo');
      $("#show-image").attr("src",image);

   });
</script>