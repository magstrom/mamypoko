<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/auth/auth.php'); 
?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-12 form-c2c">
                        <form enctype="multipart/form-data" id="addUserForm" action="/function/news/postnews.php" method="post" class="form-horizontal" onsubmit="return postdescription()">
                           <div class="form-group">
                              <label for="" class="col-sm-2">News Title</label>
                              <div class="col-sm-5">
                                 <input name="name" type="text" class="form-control" placeholder="Title">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Content</label>
                              <div class="col-sm-5">
                                 <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Image</label>
                              <div class="col-sm-5">
                                 <input name="image" type="file" class="form-control">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Video</label>
                              <div class="col-sm-5">
                                 <input name="video" type="file" class="form-control">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                              <div class="col-sm-5">
                                 <input type="submit" value="Add News" class="btn btn-block btn-blue">
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