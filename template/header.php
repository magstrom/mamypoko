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
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/jquery-ui-1.10.3.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/font-awesome.min.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/jquery-ui-1.10.3.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/bootstrap-switch.min.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/jasny-bootstrap.min.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/dataTables.bootstrap.css">
   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/animate.css">

   <link rel="stylesheet" href="http://<?php echo getAssetPath() ?>/css/formValidation.min.css">
   <script src="http://<?php echo getAssetPath() ?>/js/vendor/jquery-1.11.1.min.js"></script>
   <script src="http://<?php echo getAssetPath() ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
   <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   <![endif]-->
   <div class="page-container">
      <div class="sidebar-menu">
         <header>
            <div class="logo">
               <a href="<?php echo $hostURL = "http://$_SERVER[HTTP_HOST]".'/view/dashboard.php'; ?>">
                  <img src="http://<?php echo getAssetPath() ?>/images/lovediary.png" class="img-responsive" alt="MamyPoko">
               </a>
            </div>
         </header>