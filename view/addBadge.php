<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
      require_once(getFunctionPath() . '/badges/badges.php');  
?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-12 form-mp">
                        <form enctype="multipart/form-data" method="post" action="/function/badges/postBadges.php" id="addStickerGroup" class="form-horizontal">
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Badge Name</label>
                              <div class="col-sm-5">
                                 <input type="text" name="title" class="form-control" placeholder="Badge name..">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-5">
                                 <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Parameter</label>
                              <div class="col-sm-2">
                                 <select class="form-control" name="category" id="">
                                   <option value="diary">Diary</option>
                                   <option value="media">Media</option>
                                   <option value="friend">Friend</option>
                                 </select>
                              </div>
                              <div class="col-sm-1">
                                <input type="text" class="form-control" disabled value=">=">
                              </div>
                              <div class="col-sm-2">
                                <input type="number" name="number" class="form-control" placeholder="number..">
                              </div>
                           </div>
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-5">
                                 <input type="file" class="form-control" name="image" placeholder="Choose Photo..">
                              </div>
                           </div>    
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" value="Add Badge" class="btn btn-blue btn-block">
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