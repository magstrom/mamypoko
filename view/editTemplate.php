<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/template/template.php'); 
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
                  $detail = getTemplateDetail($id);
                 // print_r($detail);echo "<br>";
                   $idx = $detail['id'];
                  //print_r($idx);echo "<br>";
                  $name = $detail['name'];
                  $desc = $detail['description'];

                   ?>
                  <div class="row">
                     <div class="col-md-12 form-mp">
                        <form method="post" action="/function/template/putTemplate.php" id="addTemplate" class="form-horizontal fv-form fv-form-bootstrap">
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Name</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                              </div>
                           </div>
                           <div class="form-group has-feedback">
                              <label class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-5">
                                 <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $desc ?></textarea>
                              </div>
                           </div>                        
                           <div class="form-group">
                              <label for="" class="col-sm-2"></label>
                                 <div class="col-sm-3">
                                     <input type="submit" name="" value="Edit Template" class="btn btn-info btn-block">
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