<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <title>MamyPoko Dashboard Admin</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/bootstrap.min.css">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/style.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/font-awesome.min.css">
   <script src="http://<?php echo getAssetPath() ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
   <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   <![endif]-->
   <div id="modalError" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Error</h4>
        </div>
        <div class="modal-body">
          <p>Your username / password is wrong. Please try again.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
     <div id="modalDectived" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Error</h4>
        </div>
        <div class="modal-body">
          <p>Your account is inactive. Please contact your admin.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="login">
    <div class="box-login">
       <img src="assets/images/logo.png" class="img-responsive" alt="MamyPoko">
       <div class="mt20"></div>
       <div class="loginform">
          <form action="/function/auth/login.php">
             <div class="form-group">
                <input type="text" name="email" class="form-control" id="emailLogin" placeholder="Enter Username">
             </div>
             <div class="form-group">
                <input type="password" name="password" class="form-control" id="passwordLogin" placeholder="Password">
             </div>

             <input type="submit" value="Login" class="btn btn-blue btn-block">
          </form>
       </div>
    </div>
  </div>     
  <script src="http://<?php echo getAssetPath() ?>/js/vendor/jquery-1.11.1.min.js"></script>
  <script src="http://<?php echo getAssetPath() ?>/js/vendor/bootstrap.min.js"></script>

  <script>
  <?php if($_GET['login'] == 'error'){ ?>
  jQuery(document).ready(function(){
      $('#modalError').modal('show');
   });
  <?php } ?>
  <?php if($_GET['login'] == 'deadactived'){ ?>
  jQuery(document).ready(function(){
      $('#modalDectived').modal('show');
   });
  <?php } ?>
  </script>
</body>
</html>
