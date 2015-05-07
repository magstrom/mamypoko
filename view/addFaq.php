<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/auth/auth.php'); 
   require_once(getFunctionPath() . '/faq/faq.php');
?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-12 form-c2c">
                        <form enctype="multipart/form-data" id="addUserForm" action="/function/faq/postfaq.php" method="post" class="form-horizontal">
                           <div class="form-group">
                              <label for="" class="col-sm-2">FAQ Title</label>
                              <div class="col-sm-5">
                                 <input name="title" type="text" class="form-control" placeholder="Title">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Content</label>
                              <div class="col-sm-5">
                                 <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                              <div class="col-sm-5">
                                 <input type="submit" value="Add FAQ" class="btn btn-block btn-blue">
                              </div>
                           </div>
                        </form>
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