<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php'); 
?>
<!-- Modal Detail Member User Information -->
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDetail" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelDetail">Detail Information</h4>
      </div>
      <div class="modal-body">
         
         <table class="table table-striped">
            <tr>
               <td width="150px">Title</td>
               <td width="10px">:</td>
               <td>Pocari Push Notif Title</td>
            </tr>
            <tr>
               <td>Message</td>
               <td width="10px">:</td>
               <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores tempore, obcaecati cumque! Earum numquam ipsum dicta deleniti optio nihil. Consectetur voluptate quasi voluptas numquam, amet repellendus harum debitis animi dicta.</td>
            </tr> 
            <tr>
               <td>Type</td>
               <td width="10px">:</td>
               <td>Scheduled</td>
            </tr>
            <tr>
               <td>Recipient</td>
               <td width="10px">:</td>
               <td>Agung Wiseso</td>
            </tr>
            <tr>
               <td>Send Time</td>
               <td width="10px">:</td>
               <td>02/02/2015 00.03 WIB</td>
            </tr>
            <tr>
               <td>Status</td>
               <td width="10px">:</td>
               <td><span class="badge green-alert">Sent</span></td>
            </tr>
            <tr class="info">
               <td>Created Date</td>
               <td width="10px">:</td>
               <td>01/01/2015</td>
            </tr>
            <tr class="info">
               <td>Created By</td>
               <td width="10px">:</td>
               <td>Robert D</td>
            </tr>
            <tr class="info">
               <td>Updated Date</td>
               <td width="10px">:</td>
               <td>01/02/2015</td>
            </tr>
            <tr class="info">
               <td>Updated By</td>
               <td width="10px">:</td>
               <td>Agung</td>
            </tr>
         </table>
      </div>
    </div>
  </div>
</div>
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php');  ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <a href="/view/addNotif.php" class="btn btn-info">Add Notification</a>
                        <div class="mt20"></div>
                        <div class="table-mp">
                           <table id="tbNotifList" class="table table-striped display" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th width="200px">Title</th>
                                    <th width="250px">Message</th>
                                    <th>Schedule Type</th>
                                    <th>Status</th>
                                    <th>Send Time</th>
                                    <th>Action</th>
                                 </tr>
                              <thead>
                              <tbody>
                                 <tr>
                                    <td>Dapatkan Boneka Lucu Pokojang</td>
                                    <td>Nantikan Boneka Lucu Pokojang dirumah anda</td>
                                    <td>Scheduled</td>
                                    <td align="center"><span class="badge">Pending</span></td>
                                    <td>2015-10-29 16:00:00</td>
                                    <td align="center" class="actionTb">
                                       <a class="edit btn btn-xs btn-success" data-toggle="modal" data-target="#detail-modal" data-toggle="tooltip" data-placement="top" title="Detail Information" href=""><i class="fa fa-location-arrow"></i> Detail</a>
                                    </td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div> <!-- .container -->
<script>
   $(document).ready(function() {
      jQuery("[name='pushStatus']").bootstrapSwitch();
      // close alert
      jQuery("#alert-hide").fadeTo(5000, 500).slideUp(500, function(){
          jQuery("#alert-hide").alert('close');
      });

      var table = $('#tbNotifList').DataTable();
        // Add event listener for opening and closing details
      $('#tbNotifList tbody').on('click', 'td.details-control', function () {
           var tr = $(this).closest('tr');
           var row = table.row( tr );
    
           if ( row.child.isShown() ) {
               // This row is already open - close it
               row.child.hide();
               tr.removeClass('shown');
           }
           else {
               // Open this row
               row.child( format(row.data()) ).show();
               tr.addClass('shown');
           }
      } );
   } );
</script>
<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>