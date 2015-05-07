<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php'); 
?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-12 form-mp">
                        <form enctype="multipart/form-data" method="post" action="/function/stickerGroup/postStickerGroup.php" id="addStickerGroup" class="form-horizontal">
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Name</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="name" placeholder="Name..">
                              </div>
                           </div>
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-5">
                                 <input type="file" class="form-control" name="image" placeholder="Choose Photo..">
                              </div>
                           </div>                        
                           
                           <div class="form-group">
                              <label class="col-xs-2 control-label">Sticker</label>
                              <div class="col-xs-3">
                                 <input type="text" class="form-control" name="stickerName[]" placeholder="Sticker name"/>
                              </div>
                              <div class="col-xs-5">
                                 <input type="file" class="form-control" name="sticker[]" placeholder="Select Sticker"/>
                              </div>
                              <div class="col-xs-2">
                                 <button type="button" class="btn btn-orange addButton"><i class="fa fa-plus"></i></button>
                              </div>
                           </div>
                           <!-- The option field template containing an option field and a Remove button -->
                           <div class="form-group hide" id="optionTemplate">
                              <label class="col-xs-2 control-label">Sticker</label>
                              <div class="col-xs-3">
                                 <input type="text" class="form-control" name="stickerName[]" placeholder="Sticker name"/>
                              </div>
                              <div class="col-xs-5">
                                 <input type="file" class="form-control" name="sticker[]" placeholder="Select Sticker"/>
                              </div>
                              <div class="col-xs-2">
                                 <button type="button" class="btn btn-danger removeButton"><i class="fa fa-minus"></i></button>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" name="" value="Add Sticker" class="btn btn-info btn-block">
                                 </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   $(document).ready(function() {
      var MAX_OPTIONS = 20;
      $('#addStickerGroup').formValidation({
        framework: 'bootstrap',
        // excluded: [':disabled'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required'
                    },
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'The Image is required'
                    }
                }
            },
            'stickerName[]': {
                validators: {
                    notEmpty: {
                        message: 'The Sound file name is required'
                    }
                }
            },
            'sticker[]': {
                validators: {
                    notEmpty: {
                        message: 'The Sound file name is required'
                    }
                }
            }
        }
      })
      // Add button click handler
      .on('click', '.addButton', function() {
         var $template = $('#optionTemplate'),
             $clone    = $template
                             .clone()
                             .removeClass('hide')
                             .removeAttr('id')
                             .insertBefore($template),
             $sticker      = $clone.find('[name="sticker[]"]');
             $stickerName  = $clone.find('[name="stickerName[]"]');

         // Add new field
         $('#addStickerGroup').formValidation('addField', $sticker);
         $('#addStickerGroup').formValidation('addField', $stickerName);
        
      })
      // Remove button click handler
      .on('click', '.removeButton', function() {
         var $row    = $(this).parents('.form-group'),
             $sticker      = $row.find('[name="sticker[]"]');
             $stickerName      = $row.find('[name="stickerName[]"]');
         
         // Remove element containing the option
         $row.remove();
         // Remove field
         $('#addStickerGroup').formValidation('removeField', $sticker);
         $('#addStickerGroup').formValidation('removeField', $stickerName);
      })

      // Called after adding new field
      .on('added.field.fv', function(e, data) {
         // data.field   --> The field name
         // data.element --> The new field element
         // data.options --> The new field options
         if (data.field === 'sticker[]') {
             if ($('#addStickerGroup').find(':visible[name="sticker[]"]').length >= MAX_OPTIONS) {
                 $('#addStickerGroup').find('.addButton').attr('disabled', 'disabled');
             }
         }
         if (data.field === 'stickerName[]') {
             if ($('#addStickerGroup').find(':visible[name="stickerName[]"]').length >= MAX_OPTIONS) {
                 $('#addStickerGroup').find('.addButton').attr('disabled', 'disabled');
             }
         }
      })
      // Called after removing the field
      .on('removed.field.fv', function(e, data) {
        if (data.field === 'sticker[]') {
             if ($('#addStickerGroup').find(':visible[name="sticker[]"]').length < MAX_OPTIONS) {
                 $('#addStickerGroup').find('.addButton').removeAttr('disabled');
             }
         }
         if (data.field === 'stickerName[]') {
             if ($('#addStickerGroup').find(':visible[name="stickerName[]"]').length < MAX_OPTIONS) {
                 $('#addStickerGroup').find('.addButton').removeAttr('disabled');
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