<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/badges/badges.php');
   require_once(getFunctionPath() . '/emoji/emoji.php');   
?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <?php
                  if (isset($_GET['id'])) {
                     $id = $_GET['id'];
                     } 
                  $emoji = getEmojiDetail($id);
                  //print_r($emoji);echo "<br>";
                   ?>
                  <div class="row">
                     <div class="col-md-12 form-mp">
                        <form enctype="multipart/form-data" method="post" action="/function/emoji/putEmoji.php" id="addStickerGroup" class="form-horizontal">
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Name</label>
                              <div class="col-sm-5">
                                 <input type="text" disabled class="form-control" name="name" value="<?php echo $emoji['id'] ?>">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $emoji['id'] ?>">
                              </div>
                           </div>
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-5">
                                <img src="<?php echo $emoji['image']?>" width="auto" height="150" alt="">
                                 <input type="file" class="form-control" name="image" placeholder="Select Emoji..">
                                 <input type="hidden" class="form-control" name="oldemoji" value="<?php echo $emoji['image'] ?>">
                              </div>
                           </div>    
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" value="Edit Emoji" class="btn btn-blue btn-block">
                                 </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   $(document).ready(function() {
      var MAX_OPTIONS = 5;
      $('#addBadge').formValidation({
        framework: 'bootstrap',
        // excluded: [':disabled'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'The Layout Name is required'
                    },
                }
            },
            url: {
                validators: {
                    notEmpty: {
                        message: 'The URL is required'
                    },
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            }
        }
      })
  
   });
</script>
<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>