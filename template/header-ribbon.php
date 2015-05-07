
      <div class="main-body">
         <div id="wrap-content">
            <div class="main-ribbon">
               <?php require_once(getTemplatePath() . '/title-ribbon.php'); ?>
               <ul class="nav navbar-nav toolbar pull-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                        <span class="hidden-xs"><?php echo getLoggedName(); ?><i class="fa fa-caret-down"></i></span>&nbsp;
                        <!-- <img src="http://<?php echo getAssetPath() ?>/images/avatar.png" width="25" alt="Sandra"> -->
                     </a>
                     <ul class="dropdown-menu userinfo arrow">
                        <li class="username">
                            <div class="pull-left">
                              <!-- <img src="http://<?php echo getAssetPath() ?>/images/avatar.png" alt="Avatar"> -->
                              <h5>Hi, <?php echo getLoggedName(); ?></h5>
                            </div>
                        </li>
                        <li class="userlinks">
                           <a href="/view/logout.php">Logout <i class="fa fa-power-off pull-right"></i></a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="linecolor"></div>
            <div class="main-content">
               