<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/auth/auth.php');
   require_once(getFunctionPath() . '/account/account.php'); 
   require_once(getFunctionPath() . '/common/utilities.php'); 
?>

<?php 

$token = getToken();
//$client = getClientLogged($token);
$name = getLoggedName();
$email = getLoggedEmail();
// echo $token;echo "<br>";
// echo $name;echo "<br>";
// echo $email;echo "<br>";
$account = getAccount();
$data = $account['accounts'];
//print_r($data);echo "<br>";
$totalUser = count($data); 
?>
<!-- Showing Filter Search -->
<div class="modal fade" id="showSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel">Filter Search</h4>
      </div>
      <div class="modal-body form-mp">
         <form action="" id="filterSearchForm" class="form-horizontal">
            <div class="form-group">
               <label class="col-sm-2 control-label">Name</label>
               <div class="col-sm-5">
                  <input type="text" name="name" class="form-control" placeholder="Name..">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 control-label">Email</label>
               <div class="col-sm-5">
                  <input type="email" name="email" class="form-control" placeholder="Email..">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 control-label">Address</label>
               <div class="col-sm-5">
                  <input type="text" name="address" class="form-control" placeholder="Address..">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 control-label">Phone</label>
               <div class="col-sm-5">
                  <input type="text" name="phone" class="form-control" placeholder="Phone..">
               </div>
            </div>
            <!-- <div class="form-group">
               <label class="col-sm-2 control-label">Friends</label>
               <div class="col-sm-5">
                  <select name="" class="form-control" id="">
                     <option value="">-- by friends--</option>
                     <option value=""> < 100 </option>
                     <option value=""> >= 100 </option>
                     <option value=""> >= 200 </option>
                     <option value=""> >= 300 </option>
                     <option value=""> >= 400 </option>
                     <option value=""> >= 500 </option>
                  </select>
               </div>
            </div> -->
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-blue btn-sm">Search</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Showing User Detail Modal -->
<div class="modal fade" id="showDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel">User Detail</h4>
      </div>
      <div class="modal-body table-mp">
         <div class="detailModalBody">
            <div class="aboutMamy">
               <img src="http://<?php echo getAssetPath() ?>/images/avatar.png" alt="Mamy Sandra">
               <div class="detailMamy">
                  <h2>Mamy Sandra</h2>
                  <div class="badgeMamy">
                     <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                    <img src="http://<?php echo getAssetPath() ?>/images/photo.jpg" data-placement="top" title="" href="" data-original-title="Badge Name">
                  </div>
               </div>
            </div>

            <div class="clearfix"></div>
            <div class="mt20"></div>
            <div class="row">
               <div class="col-sm-6">
                  Email : sandra@gmail.com <br>
                  Phone : 09798777688 <br>
                  Friends : 50 <br>
                  Uploads : 200 times
               </div>
               <div class="col-sm-6">
                  <address class="pull-right">
                     Horizon Broadway Blok M2 No.20 <br>
                     Serpong - Kecamatan Cisauk <br>
                     Tangerang. 158782
                  </address>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="mt20"></div>

            <table class="table">
               <thead>
                  <tr>
                     <th>
                        Si Kecil
                     </th>
                     <th>
                        Gender 
                     </th>
                     <th>
                        Birthday
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Baim</td>
                     <td>Cowok</td>
                     <td>02/10/2014</td>
                  </tr>
                  <tr>
                     <td>Citata</td>
                     <td>Cewek</td>
                     <td>11/05/2014</td>
                  </tr>
               </tbody>
            </table>
            
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <!-- <div class="row">
                     <div class="col-md-4">
                        <div class="box">
                           <img class="img-responsive" src="http://<?php echo getAssetPath() ?>/images/bgbox.png" alt="">
                           <div>
                              <h4>New User Today</h4>
                              <h3>83</h3>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box">
                           <img class="img-responsive" src="http://<?php echo getAssetPath() ?>/images/bgbox.png" alt="">
                           <div>
                              <h4>Active User</h4>
                              <h3>183</h3>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box">
                           <img class="img-responsive" src="http://<?php echo getAssetPath() ?>/images/bgbox.png" alt="">
                           <div>
                              <h4>Total User</h4>
                              <h3><?php echo $totalUser; ?></h3>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                           <a href="/view/dashboard.php" class="btn btn-info active" role="button">Manage User</a>
                           <a href="/view/location.php" class="btn btn-info" role="button">User by Location</a>
                           <a href="/view/topuser.php" class="btn btn-info" role="button">Top User</a>
                        </div>
                     </div>
                     <div class="mt20">&nbsp;</div>
                     <div class="col-md-12 table-mp">
                        <div class="panel">
                           
                           <div class="panel-body">
                              <!-- <div class="pull-left">
                                 <button id="filterSearch" class="btn btn-success" data-toggle="modal" data-target="#showSearch">Filter Search</button>
                              </div>
                              <div class="pull-right">
                                 <span>From</span> <input id="startFilter" type="text" class="form-control" placeholder="From" style="width:100px; display:inline; margin:0 5px;">
                                 <span>To</span> <input id="endFilter" type="text" class="form-control" placeholder="To" style="width:100px; display:inline; margin:0 5px;">
                                 <button id="filterBtn" class="btn btn-blue">Filter</button>
                              </div> -->
                              
                              <div class="pull-right">
                                 <a id="excelDownload" href="/view/excelDashboard.php" class="btn btn-warning">
                                    <i class="fa fa-file-excel-o"></i> Download
                                 </a>
                              </div>
                              <div class="clearfix"></div>
                              <div class="mt20"></div>
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Register</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Baby</th>
                                       <th>Address</th>
                                       <th>Province</th>
                                       <!-- <th>Detail</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                       <?php 
                                          
                                          foreach ($data as $item) {
                                             //print_r($item);echo "<br>";
                                             $baby = $item['babies'];
                                            // print_r($baby);echo "<br>";
                                            // $babyCount = count ($baby);

                                             
                                        ?>
                                    <tr>
                                       <td><?php echo printUnixTimestamp($item['timestamp']) ?></td>
                                       <td><?php echo $item['name'] ?></td>
                                       <td><?php echo $item['email'] ?></td>
                                       <td><?php echo $item['phone'] ?></td>
                                       <td><?php echo count ($baby) ?></td>
                                       <?php if (array_key_exists('address', $item)) { ?>
                                       <td><?php echo $item['address'] ?></td> 
                                       <?php }else{ ?>
                                       <td> - </td>    
                                       <?php } ?>
                                       <?php if (array_key_exists('province', $item)) { ?>
                                       <td><?php echo $item['province'] ?></td> 
                                       <?php }else{ ?>
                                       <td> - </td>    
                                       <?php } ?>
                                       <!-- <td><a href="" class="btn btn-xs btn-success" data-toggle="modal" data-target="#showDetail"><i class="fa fa-location-arrow"></i> Detail</a></td> -->
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
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