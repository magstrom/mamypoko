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
     <title>Forgot Password</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://<?php echo getAssetPath() ?>/css/bootstrap.min.css">
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://<?php echo getAssetPath() ?>/css/main.css">
     <script src="https://<?php echo getAssetPath() ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
 </head>
<body>
   <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   <![endif]-->
   <?php 
                              if(isset($_GET["status"]))
                                  $status = $_GET["status"];
                      if($status == 'success'){
                        $message = 'Please Check Your Email';
                      }else{
                        $message = 'Enter your email address. You will receive a link to create a new password via email';
                      }
    ?>
   <div class="login-c2c">
      <div class="box-login-c2c">
         <img src="https://<?php echo getAssetPath() ?>/img/logo.png" class="img-responsive" alt="Click2Catch">
         <div class="mt20"></div>
         <div class="loginform">
            <div class="notifBox" style="background: #fff; margin-bottom:20px; padding:10px 12px; border-left:3px solid #FF8000; font-size:13px">
              <?php 
              echo $message;
               ?>
            </div>
            <form action="/function/user/postEmail.php" method="post">
               <div class="form-group">
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
               </div>
            
               <input type="submit" value="Get New Password" class="btn btn-block btn-orange">
            </form>
            <div class="mt20"></div>
            <a href="./" style="color:#fff">&#8592; Login</a>

         </div>
      </div>
   </div>     
   <script src="https://<?php echo getAssetPath() ?>/js/vendor/jquery-1.11.1.min.js"></script>
   <script src="https://<?php echo getAssetPath() ?>/js/vendor/bootstrap.min.js"></script>  
</body>
</html>
