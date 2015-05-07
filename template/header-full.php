     <div class="main-body">
         <div id="wrap-content">
            <div class="main-ribbon">
               <div class="homeLogo">
                  <a href="<?php echo $hostURL = "http://$_SERVER[HTTP_HOST]".'/view/home.php'; ?>">
                     <img src="http://<?php echo getAssetPath() ?>/img/logo.png" width="50px" alt="Click2Catch">
                  </a>
                  <?php 
                     $hostURL = "http://$_SERVER[HTTP_HOST]";
                     $actualURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                     if(($actualURL == $hostURL.'/view/profile/edit.php')){
                        echo "<h3>Edit Profile</h3>";
                     }
                     if(($actualURL == $hostURL.'/view/profile/')){
                        echo "<h3>Your Profile </h3>";
                     }
                     if(($actualURL == $hostURL.'/view/home.php')){
                        echo "<h3>Campaign List</h3>";
                     }
                     if(($actualURL == $hostURL.'/view/home.php?status=ongoing')){
                        echo "<h3>Active Campaign</h3>";
                     }
                     if(($actualURL == $hostURL.'/view/home.php?status=finished')){
                        echo "<h3>Finished</h3>";
                     }
                  ?>
               </div>
               <?php include 'title-ribbon.php' ?>
               <ul class="nav navbar-nav toolbar pull-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                        <span class="hidden-xs" style="float:left"><?php echo getClientName();?> <i class="fa fa-caret-down"></i></span>&nbsp;
                        <?php if(empty(getClientLogo())) {?>
                        <img src="/assets/img/avatar.png"  width="25" alt="<?php echo getClientName();?>">
                        <?php }else{ ?>
                        <img src="<?php echo getClientLogo();?>" width="25" alt="<?php echo getClientName();?>">
                        <?php } ?>
                     </a>
                     <ul class="dropdown-menu userinfo arrow">
                        <li class="username">
                           <?php if(empty(getClientLogo())) {?>
                           <div class="pull-left">
                              <img src="/assets/img/avatar.png" alt="Dangerfield">
                           </div>
                           <?php }else{ ?>
                           <div class="pull-left">
                              <img src="<?php echo getClientLogo();?>" alt="Dangerfield">
                           </div>
                           <?php } ?>
                         <div class="pull-left">
                              <h5>Welcome
                           </div>
                        </li>
                        <li class="userlinks">
                           <a href="/view/logout.php">Logout <i class="fa fa-power-off pull-right"></i></a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="main-content">