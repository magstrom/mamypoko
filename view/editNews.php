<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/auth/auth.php');
   require_once(getFunctionPath() . '/news/news.php'); 
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
                    $news = getNewsDetail($id);
                    $newsData = $news['news'];
                    //$video = $news['news']['video'];
                    //$image = $news['news']['image'];
                    //print_r($newsData);echo "<br>";
                   ?>
                  <div class="row">
                     <div class="col-md-12 form-c2c">
                        <form enctype="multipart/form-data" id="addUserForm" action="/function/news/putnews.php" method="post" class="form-horizontal" onsubmit="return postdescription()">
                           <div class="form-group">
                              <label for="" class="col-sm-2">News Title</label>
                              <div class="col-sm-5">
                                 <input name="name" type="text" class="form-control" value="<?php echo $newsData['name'] ?>">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Content</label>
                              <div class="col-sm-5">
                                 <textarea name="content" id="" cols="30" rows="10" class="form-control"><?php echo $newsData['content'] ?></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Image</label>
                              <div class="col-sm-5">
                                 <?php 
                                 if (array_key_exists('image', $newsData)) {
                                  ?>
                                 <img src="<?php echo $news['news']['image'] ?>" >
                                 <input name="image" type="file" class="form-control">
                                 <?php }else{ ?>
                                 <input name="image" type="file" class="form-control">
                                 <?php } ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2">Video</label>        
                              <div class="col-sm-5">
                                  <?php 
                                 if (array_key_exists('video', $newsData)) {
                                  ?>
                                 <video width="400" height="320" controls>
                                   <source src="<?php echo $news['news']['video'] ?>" type="video/mp4">
                                 </video>
                                 <br>
                                 <?php }else{ ?>
                                 <input name="video" type="file" class="form-control">
                                 <?php } ?>  
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                              <div class="col-sm-5">
                                 <input type="submit" value="Update News" class="btn btn-block btn-blue">
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