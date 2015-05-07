<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/template/template.php');
   require_once(getFunctionPath() . '/layout/layout.php'); 
?>
<style>
  .positionform div.col-xs-2,.positionform div.col-xs-1{padding:0 1px !important; width: 130px;}
  .positionform div.col-xs-2.firstcol{padding-left: 15px !important;}
</style>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <?php 
                  if (isset($_GET['id'])) {
                     $id = $_GET['id'];
                     
                     //print_r($template);echo "<br>";
                     }
                  if (isset($_GET['template'])) {
                     $templateID = $_GET['template'];
                     }
                     $template = getTemplateDetail($templateID);
                     $layoutDetail = getLayoutDetail($id);
                     // /print_r($layoutDetail);echo "<br>";
                     $total = $layoutDetail['total_photo'];
                     //print_r($templateID);echo "<br>";
                   ?>
                  <div class="row">
                     <div class="col-md-12 form-mp">
                        <form enctype="multipart/form-data" method="post" action="/function/layout/putLayout.php" id="addLayout" class="form-horizontal">
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Template Name</label>
                              <div class="col-sm-5">
                                 <input disabled type="text" class="form-control" name="name" value="<?php echo $template['name'] ?>">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                                 <input type="hidden" class="form-control" name="template" value="<?php echo $templateID ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Layout Name</label>
                              <div class="col-sm-5">
                                 <input type="text" name="title" class="form-control" value="<?php echo $layoutDetail['name'] ?>">
                              </div>
                           </div>
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Layout</label>
                              <div class="col-sm-5">
                                 <img src="<?php echo $layoutDetail['url']?>" width="auto" height="150" alt="">
                              </div>
                           </div>
                           
                           <?php 
                           for($i = 0; $i<$total; $i++) { ?>
                            <div class="form-group positionform">
                              <label class="col-xs-2 control-label">Position</label>
                              <div class="col-xs-2 firstcol">
                                 <input type="text" class="form-control" name="x[]" value="<?php echo $layoutDetail['positions'][$i]['x'] ?>"/>
                                 <span style="font-size:11px; display:block">x Position</span>
                              </div>
                              <div class="col-xs-2">
                                <input type="text" name="y[]" class="form-control" value="<?php echo $layoutDetail['positions'][$i]['y'] ?>">
                                <span style="font-size:11px; display:block">y Position</span>
                              </div>
                              <div class="col-xs-2">
                                 <input type="text" class="form-control" name="height[]" value="<?php echo $layoutDetail['positions'][$i]['height'] ?>"/>
                                 <span style="font-size:11px; display:block">Height</span>
                              </div>
                              <div class="col-xs-2">
                                <input type="text" name="width[]" class="form-control" value="<?php echo $layoutDetail['positions'][$i]['width'] ?>">
                                <span style="font-size:11px; display:block">Width</span>
                              </div>
                              <div class="col-xs-1">
                                <input type="text" name="rotation[]" class="form-control" value="<?php echo $layoutDetail['positions'][$i]['rotation'] ?>">
                                <span style="font-size:11px; display:block">Rotation</span>
                              </div>
                           </div>
                           <?php }
                            ?>
                           <!-- The option field template containing an option field and a Remove button -->
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" value="Edit Layout" class="btn btn-blue btn-block">
                                 </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   $(document).ready(function() {
      var MAX_OPTIONS = 5;
      $('#addLayout').formValidation({
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
            },
            totalPhotos: {
                validators: {
                    notEmpty: {
                        message: 'Total Photos is required'
                    }
                }
            },
            'x[]': {
                validators: {
                    notEmpty: {
                        message: 'The Sound file name is required'
                    }
                }
            },
            'y[]': {
                validators: {
                    notEmpty: {
                        message: 'The Redirect URL is required'
                    }
                }
            },
            'height[]': {
                validators: {
                    notEmpty: {
                        message: 'The height is required'
                    }
                }
            },
            'width[]': {
                validators: {
                    notEmpty: {
                        message: 'The width is required'
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
             $x      = $clone.find('[name="x[]"]');
             $y      = $clone.find('[name="y[]"]');
             $height = $clone.find('[name="height[]"]');
             $width  = $clone.find('[name="width[]"]');

         // Add new field
         $('#addLayout').formValidation('addField', $x);
         $('#addLayout').formValidation('addField', $y);
         $('#addLayout').formValidation('addField', $height);
         $('#addLayout').formValidation('addField', $width);
      })
      // Remove button click handler
      .on('click', '.removeButton', function() {
         var $row    = $(this).parents('.form-group'),
             $x      = $row.find('[name="x[]"]');
             $y      = $row.find('[name="y[]"]');
             $height = $row.find('[name="height[]"]');
             $width  = $row.find('[name="width[]"]');
         // Remove element containing the option
         $row.remove();
         // Remove field
         $('#addLayout').formValidation('removeField', $x);
         $('#addLayout').formValidation('removeField', $y);
         $('#addLayout').formValidation('removeField', $height);
         $('#addLayout').formValidation('removeField', $width);
      })

      // Called after adding new field
      .on('added.field.fv', function(e, data) {
         // data.field   --> The field name
         // data.element --> The new field element
         // data.options --> The new field options
         if (data.field === 'x[]') {
             if ($('#addLayout').find(':visible[name="x[]"]').length >= MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').attr('disabled', 'disabled');
             }
         }
         if (data.field === 'y[]') {
             if ($('#addLayout').find(':visible[name="y[]"]').length >= MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').attr('disabled', 'disabled');
             }
         }
         if (data.field === 'height[]') {
             if ($('#addLayout').find(':visible[name="height[]"]').length >= MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').attr('disabled', 'disabled');
             }
         }
         if (data.field === 'width[]') {
             if ($('#addLayout').find(':visible[name="width[]"]').length >= MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').attr('disabled', 'disabled');
             }
         }
      })
      // Called after removing the field
      .on('removed.field.fv', function(e, data) {
        if (data.field === 'x[]') {
             if ($('#addLayout').find(':visible[name="x[]"]').length < MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').removeAttr('disabled');
             }
         }
         if (data.field === 'y[]') {
             if ($('#addLayout').find(':visible[name="y[]"]').length < MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').removeAttr('disabled');
             }
         }
         if (data.field === 'height[]') {
             if ($('#addLayout').find(':visible[name="height[]"]').length < MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').removeAttr('disabled');
             }
         }
         if (data.field === 'width[]') {
             if ($('#addLayout').find(':visible[name="width[]"]').length < MAX_OPTIONS) {
                 $('#addLayout').find('.addButton').removeAttr('disabled');
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