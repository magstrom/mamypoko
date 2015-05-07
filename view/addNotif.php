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
                     <div class="col-md-12 form-c2c">
                        <form action="" id="addNotifForm" class="form-horizontal">
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Title</label>
                              <div class="col-sm-5">
                                 <input type="text" name="title" class="form-control" placeholder="Title..">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Message</label>
                              <div class="col-sm-5">
                                 <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Recipient</label>
                              <div class="col-sm-5">
                                 <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="recipient" id="recipientall" value="true"> All
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="recipient" id="recipientselected" value="false"> Selected
                                    </label>
                                 </div>
                                 <div id="show-recipientselected" style="display:none">
                                    <div class="mt10"></div>
                                    <input type="text" name="memberId" class="form-control" placeholder="Type Recipient member ID..">
                                 </div>
                              </div>
                           </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Schedule Type</label>
                              <div class="col-sm-5">
                                 <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="scheduletype" id="scheduletypescheduled" value="true"> Sheduled
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="scheduletype" id="scheduletypeinstant" value="false"> Instant
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div id="show-datetime" class="form-group" style="display:none">
                              <label class="col-sm-2 control-label">Date Send Time</label>
                              <div class="col-sm-5">
                                 <input type="text" id="dateTimeNotif" name="datetimenotif" class="form-control"  placeholder="Date Send Time..">
                              </div>
                           </div>
                           

                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" value="Send Push Notification" class="btn btn-blue btn-block">
                                 </div>
                           </div>
                           </form>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   $(document).ready(function() {
      $('#addNotifForm').formValidation({
         framework: 'bootstrap',
         icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
         },
         fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required'
                    },
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'The Message is required'
                    },
                }
            },
            recipient: {
                validators: {
                    notEmpty: {
                        message: 'The Recipient is required'
                    },
                }
            },
            memberId: {
                validators: {
                    notEmpty: {
                        message: 'The Member ID is required'
                    },
                }
            },
            rateofpush: {
              validators: {
                  notEmpty: {
                        message: 'The Field is required'
                    },
                  between: {
                      min: 0,
                      max: 1,
                      message: 'The Rate of Push must be number between 0 and 1'
                  }
               }
            },
            scheduletype: {
                validators: {
                    notEmpty: {
                        message: 'The Schedule Type is required'
                    },
                }
            },
            datetimenotif: {
                validators: {
                    notEmpty: {
                        message: 'The Date Time is required'
                    },
                }
            },
            
            
         }
      });
      $('input[name="recipient"]').click(function() {
         if ($(this).attr('id') == 'recipientselected') {
             $('#show-recipientselected').show(200);
         }
         else {
             $('#show-recipientselected').hide(100);
         }
      });
      $('input[name="scheduletype"]').click(function() {
         if ($(this).attr('id') == 'scheduletypescheduled') {
             $('#show-datetime').show(200);
         }
         else {
             $('#show-datetime').hide(100);
         }
      });
   });
   </script>
<?php
   require_once(getTemplatePath() . '/footer.php');
      } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>