<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/statistic/statistic.php');
      require_once(getFunctionPath() . '/account/account.php');   
?>
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
<?php 
$account = getAccount();
$data = $account['accounts'];
//print_r($data);echo "<br>";
$totalUser = count($data); 
//print_r($friend);echo "<br>";
 ?>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                           <a href="/view/dashboard.php" class="btn btn-info" role="button">Manage User</a>
                           <a href="/view/location.php" class="btn btn-info" role="button">User by Location</a>
                           <a href="/view/topuser.php" class="btn btn-info active" role="button">Top User</a>
                        </div>
                     </div>
                     <div class="mt20">&nbsp;</div>
                     <div class="col-md-12 table-mp">
                        <!-- <div class="pull-right">
                           <span>From</span> <input id="startFilter" type="text" class="form-control" placeholder="From" style="width:100px; display:inline; margin:0 5px;">
                           <span>To</span> <input id="endFilter" type="text" class="form-control" placeholder="To" style="width:100px; display:inline; margin:0 5px;">
                           <button id="filterBtn" class="btn btn-blue">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="mt20"></div> -->
                        <div class="panel">
                           <div class="panel-body">
                              
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                       <div class="panel-heading">
                                          Top Friend
                                          <div class="pull-right">
                                             <a id="excelDownload1" href="/view/excelFriend.php" class="btn btn-xs btn-warning">
                                                <i class="fa fa-file-excel-o"></i> Download
                                             </a>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                   <th>Name</th>
                                                   <th>Friends</th>
                                                   <!-- <th>Action</th> -->
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php 
                                                $friend = getStatisticFriend();
                                                foreach ($friend as $friendData) {
                                                 ?>
                                                <tr>
                                                   <td><?php echo $friendData['profile']['name'] ?></td>
                                                   <td><?php echo $friendData['total'] ?></td>
                                                   <!-- <td><a href="" class="btn btn-xs btn-success detail-tb" data-name="<?php echo $item['name']?>" data-id="<?php echo $item['id'] ?>"  data-target="#showDetail"><i class="fa fa-location-arrow"></i> Detail</a></td> -->
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                       <div class="panel-heading">
                                          Top Diary
                                          <div class="pull-right">
                                             <a id="excelDownload2" href="/view/excelDiary.php" class="btn btn-xs btn-warning">
                                                <i class="fa fa-file-excel-o"></i> Download
                                             </a>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                   <th>Name</th>
                                                   <th>Diary</th>
                                                   <!-- <th>Action</th> -->
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php 
                                                $diary = getStatisticDiary();
                                                foreach ($diary as $diaryData) {
                                                 ?>
                                                <tr>
                                                   <td><?php echo $diaryData['profile']['name'] ?></td>
                                                   <td><?php echo $diaryData['total'] ?></td>
                                                   <!-- <td><a href="" class="btn btn-xs btn-success" data-toggle="modal" data-target="#showDetail"><i class="fa fa-location-arrow"></i> Detail</a></td> -->
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                       <div class="panel-heading">
                                          Top Media
                                          <div class="pull-right">
                                             <a id="excelDownload3" href="/view/excelMedia.php" class="btn btn-xs btn-warning">
                                                <i class="fa fa-file-excel-o"></i> Download
                                             </a>
                                          </div>
                                       </div>
                                       <div class="panel-body">
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                   <th>Name</th>
                                                   <th>Uploads</th>
                                                   <!-- <th>Action</th> -->
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php 
                                                $media = getStatisticMedia();
                                                foreach ($media as $mediaData) {
                                                 ?>
                                                <tr>
                                                   <td><?php echo $mediaData['profile']['name'] ?></td>
                                                   <td><?php echo $mediaData['total'] ?></td>
                                                   <!-- <td><a href="#" class="btn btn-xs btn-success" data-target="#showDetail"><i class="fa fa-location-arrow"></i> Detail</a></td> -->
                                                </tr>
                                                <?php } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> <!-- .container -->
<?php
   require_once(getTemplatePath() . '/footer.php'); 
?>
<script>
      $(document).on("click", ".detail-tb", function() {
      $("#showDetail").modal('show');

      var idProduct = $(this).data('id');
      $("#idProduct").val(idProduct);

      var name = $(this).data('name');
      $("#show-name").text(name);

      $('#yesDeleteBadges').attr('href', '/function/badges/deleteBadges.php?id=' + idProduct);
   });

</script>