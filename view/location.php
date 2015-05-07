<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
if (isAuthenticate()) {
   require_once(getTemplatePath() . '/header.php');
   require_once(getTemplatePath() . '/sidebar.php');
   require_once(getTemplatePath() . '/header-ribbon.php');
   require_once(getFunctionPath() . '/account/account.php');
   require_once(getFunctionPath() . '/statistic/statistic.php');   
?>

               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <?php require_once(getTemplatePath() . '/breadcrumb.php'); ?>
                     </div>
                  </div>
<!--                   <div class="row">
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
                              <h3>1083</h3>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                           <a href="/view/dashboard.php" class="btn btn-info" role="button">Manage User</a>
                           <a href="/view/location.php" class="btn btn-info active" role="button">User by Location</a>
                           <a href="/view/topuser.php" class="btn btn-info" role="button">Top User</a>
                        </div>
                     </div>
                     <div class="mt20">&nbsp;</div>
                     <div class="col-md-12">
                        <div class="panel">
                           <div class="panel-body">
                              <!-- <div class="pull-right">
                                <span>From</span> <input id="startFilter" type="text" class="form-control" placeholder="From" style="width:100px; display:inline; margin:0 5px;">
                                <span>To</span> <input id="endFilter" type="text" class="form-control" placeholder="To" style="width:100px; display:inline; margin:0 5px;">
                                <button id="filterBtn" class="btn btn-blue">Filter</button>
                             </div> -->
                             <div class="pull-right">
                                 <a id="excelDownload" href="/view/excelMap.php" class="btn btn-warning">
                                    <i class="fa fa-file-excel-o"></i> Download
                                 </a>
                              </div>
                             <div class="clearfix"></div>
                              <div style="position:relative">
                                 <div id="mapDataChart" style="width: 100%; height: 700px; margin:0 auto"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> <!-- .container -->
               <?php 
                  $provinceData = getStatisticProvince();
                  //print_r($provinceData);echo "<br>";
                  $account = getAccount();
                  $data = $account['accounts'];
                  //print_r($data);echo "<br>";
                  $aceh = 0;
                  $bali = 0;
                  $belitung = 0;
                  $banten = 0;
                  $bengkulu = 0;
                  $centralJava = 0;
                  $centralKalimantan = 0;
                  $centralSulawesi = 0;
                  $eastJava = 0;
                  $eastKalimantan = 0;
                  $eastNusaTenggara = 0;
                  $gorontalo = 0;
                  $jakarta = 0;
                  $jambi = 0;
                  $lampung = 0;
                  $maluku = 0;
                  $northKalimantan = 0;
                  $northMaluku = 0;
                  $northSulawesi = 0;
                  $northSumatra = 0;
                  $papua = 0;
                  $riau = 0;
                  $riauIsland = 0;
                  $seSulawesi = 0;
                  $southKalimantan = 0;
                  $southSulawesi = 0;
                  $southSumatra = 0;
                  $westJava = 0;
                  $westKalimantan = 0;
                  $westNusaTenggara = 0;
                  $westPapua = 0;
                  $westSulawesi = 0;
                  $westSumatra = 0;
                  $yogyakarta = 0;
                  foreach ($data as $location) {
                     if(empty($location['province'])){
                     } else {
                     $province = $location['province'];
                     //print_r($province);echo "<br>";
                     switch ($province) {
                        case "Aceh":
                            $aceh = $aceh + 1;
                            break;
                        case "Sumatera Utara":
                            $northSumatra = $northSumatra + 1;
                            break;
                        case "Sumatera Barat":
                            $westSumatra = $westSumatra + 1;
                            break;
                        case "Jambi":
                            $jambi = $jambi + 1;
                            break;
                        case "Bengkulu":
                            $bengkulu = $bengkulu + 1;
                            break;
                        case "Sumatera Selatan":
                            $southSumatra = $southSumatra + 1;
                            break;
                        case "Bangka-Belitung":
                            $belitung = $belitung + 1;
                            break;
                        case "Lampung":
                            $lampung = $lampung + 1;
                            break;
                        case "Riau":
                            $riau = $riau + 1;
                            break;
                        case "Kepulauan Riau":
                            $riauIsland = $riauIsland + 1;
                            break;
                        case "Banten":
                            $banten = $banten + 1;
                            //print_r($banten);echo "<br>";
                            break;     
                        case "Jakarta Raya":
                            $jakarta = $jakarta + 1;
                            break;
                        case "Jawa Barat":
                            $westJava = $westJava + 1;
                            break; 
                        case "Jawa Tengah":
                            $centralJava = $centralJava + 1;
                            break; 
                        case "Yogyakarta":
                            $yogyakarta = $yogyakarta + 1;
                            break; 
                        case "Jawa Timur":
                            $eastJava = $eastJava + 1;
                            break; 
                        case "Bali":
                            $bali = $bali + 1;
                            break; 
                        case "Nusa Tenggara Barat":
                            $westNusaTenggara = $westNusaTenggara + 1;
                            break; 
                        case "Nusa Tenggara Timur":
                            $eastNusaTenggara = $eastNusaTenggara + 1;
                            break;
                        case "Kalimantan Utara":
                            $northKalimantan = $northKalimantan + 1;
                            break; 
                        case "Kalimantan Barat":
                            $westKalimantan = $westKalimantan + 1;
                            break;
                        case "Kalimantan Tengah":
                            $centralKalimantan = $centralKalimantan + 1;
                            break; 
                        case "Kalimantan Timur":
                            $eastKalimantan = $eastKalimantan + 1;
                            break; 
                        case "Kalimantan Selatan":
                            $southKalimantan = $southKalimantan + 1;
                            break; 
                        case "Sulawesi Utara":
                            $northSulawesi = $northSulawesi + 1;
                            break; 
                        case "Gorontalo":
                          $gorontalo = $gorontalo + 1;
                          break; 
                        case "Sulawesi Tengah":
                          $centralSulawesi = $centralSulawesi + 1;
                          break; 
                        case "Sulawesi Barat":
                          $westSulawesi = $westSulawesi + 1;
                          break; 
                        case "Sulawesi Selatan":
                          $southSulawesi = $southSulawesi + 1;
                          break; 
                        case "Sulawesi Tenggara":
                          $seSulawesi = $seSulawesi + 1;
                          break; 
                        case "Maluku Utara":
                          $northMaluku = $northMaluku + 1;
                          break; 
                        case "Maluku":
                          $maluku = $maluku + 1;
                          break;  
                        case "Irian Jaya Barat":
                          $westPapua = $westPapua + 1;
                          break; 
                        case "Papua":
                          $papua = $papua + 1;
                          break;   
                     }                    
                  }
               }
               //print_r($banten);echo "<br>";
               ?>
<style>
.google-visualization-tooltip {  padding: 5px !important; font-size:13px;} 
.google-visualization-tooltip-item-list { padding: 0px !important;  margin:2px !important;}
.google-visualization-tooltip-item    { overflow:hidden; max-width:210px !important; padding: 0px !important; margin:1px !important; font-size:13px; white-space:nowrap;}
.google-visualization-tooltip-item span:nth-child(2) { display:inline-block; width:150px !important; text-align:right !important; }
.google-visualization-tooltip-item span:nth-child(3) { display:inline-block; width:50px !important; text-align:right !important; background-color:white;};
</style>
<!-- Map Data Chart -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    $(window).load(function() {
      $('#loader').hide();
    });
    google.load('visualization', '1', {packages: ['geochart'], 'language': 'id'});
    google.setOnLoadCallback(drawVisualization);
      function drawVisualization() {
        var data = new google.visualization.DataTable();

        data.addColumn('number', 'LATITUDE');
        data.addColumn('number', 'LONGITUDE');
        data.addColumn('string', 'DESCRIPTION'); 
        data.addColumn('number', 'Value:', 'value'); 
        data.addColumn({type:'string', role:'tooltip'}); 

      <?php if($aceh != 0){ ?>
      data.addRows([[4.0408635,96.648933, 'Aceh', parseInt('<?php echo $aceh?>'),"<?php echo 'Total: '.$aceh?>"]]);
      <?php } if($bali != 0){ ?>
      data.addRows([[-8.4554715,115.071577, 'Bali', parseInt('<?php echo $bali?>'),"<?php echo 'Total: '.$bali?>"]]);
      <?php } if($belitung != 0){ ?>
      data.addRows([[-2.8994298,107.9140491, 'Belitung', parseInt('<?php echo $belitung?>'),"<?php echo 'Total: '.$belitung?>"]]);
      <?php } if($banten != 0){ ?>
      data.addRows([[-6.4686864,106.3400821, 'Banten', parseInt('<?php echo $banten?>'),"<?php echo 'Total: '.$banten?>"]]);
      <?php } if($bengkulu != 0){ ?>
      data.addRows([[-3.835987,102.3264609, 'Bengkulu', parseInt('<?php echo $bengkulu?>'),"<?php echo 'Total: '.$bengkulu?>"]]);
      <?php } if($centralJava != 0){ ?>
      data.addRows([[-7.3071521,110.1234954, 'Jawa Tengah', parseInt('<?php echo $centralJava?>'),"<?php echo 'Total: '.$centralJava?>"]]);
      <?php } if($centralKalimantan != 0){ ?>
      data.addRows([[-1.3843149,113.2904425, 'Kalimantan Tengah', parseInt('<?php echo $centralKalimantan?>'),"<?php echo 'Total: '.$centralKalimantan?>"]]);
      <?php } if($centralSulawesi != 0){ ?>
      data.addRows([[-1.1327955,121.8147301, 'Sulawesi Tengah', parseInt('<?php echo $centralSulawesi?>'),"<?php echo 'Total: '.$centralSulawesi?>"]]);
      <?php } if($eastJava != 0){ ?>
      data.addRows([[-8.0141707,112.1801734, 'Jawa Timur', parseInt('<?php echo $eastJava?>'),"<?php echo 'Total: '.$eastJava?>"]]);
      <?php } if($eastKalimantan != 0){ ?>
      data.addRows([[0.0985775,116.431081, 'Kalimantan Timur', parseInt('<?php echo $eastKalimantan?>'),"<?php echo 'Total: '.$eastKalimantan?>"]]);
      <?php } if($eastNusaTenggara != 0){ ?>
      data.addRows([[-8.431404, 121.101795, 'Nusa Tenggara Timur', parseInt('<?php echo $eastNusaTenggara?>'),"<?php echo 'Total: '.$eastNusaTenggara?>"]]);
      <?php } if($gorontalo != 0){ ?>
      data.addRows([[0.6737436,122.3567695, 'Gorontalo', parseInt('<?php echo $gorontalo?>'),"<?php echo 'Total: '.$gorontalo?>"]]);
      <?php } if($jakarta != 0){ ?>
      data.addRows([[-6.2297465,106.829518, 'Jakarta', parseInt('<?php echo $jakarta?>'),"<?php echo 'Total: '.$jakarta?>"]]);
      <?php } if($jambi != 0){ ?>
      data.addRows([[-1.752903,102.793018, 'Jambi', parseInt('<?php echo $jambi?>'),"<?php echo 'Total: '.$jambi?>"]]);
      <?php } if($lampung != 0){ ?>
      data.addRows([[-4.9461904,104.892063, 'Lampung', parseInt('<?php echo $lampung?>'),"<?php echo 'Total: '.$lampung?>"]]);
      <?php } if($maluku != 0){ ?>
      data.addRows([[-3.755207,128.9492764, 'Maluku', parseInt('<?php echo $maluku?>'),"<?php echo 'Total: '.$maluku?>"]]);
      <?php } if($northKalimantan != 0){ ?>
      data.addRows([[2.7234529,116.2760395 , 'Kalimantan Utara', parseInt('<?php echo $northKalimantan?>'),"<?php echo 'Total: '.$northKalimantan?>"]]);
      <?php } if($northMaluku != 0){ ?>
      data.addRows([[0.3891849,127.999141, 'Maluku Utara', parseInt('<?php echo $northMaluku?>'),"<?php echo 'Total: '.$northMaluku?>"]]);
      <?php } if($northSulawesi != 0){ ?>
      data.addRows([[0.834540, 124.533515, 'Sulawesi Utara', parseInt('<?php echo $northSulawesi?>'),"<?php echo 'Total: '.$northSulawesi?>"]]);
      <?php } if($northSumatra != 0){ ?>
      data.addRows([[1.8312921,98.7421852, 'Sumatera Utara', parseInt('<?php echo $northSumatra?>'),"<?php echo 'Total: '.$northSumatra?>"]]);
      <?php } if($papua != 0){ ?>
      data.addRows([[-4.7545318,137.799296, 'Papua', parseInt('<?php echo $papua?>'),"<?php echo 'Total: '.$papua?>"]]);
      <?php } if($riau != 0){ ?>
      data.addRows([[0.8804467,101.919073, 'Riau', parseInt('<?php echo $riau?>'),"<?php echo 'Total: '.$riau?>"]]);
      <?php } if($riauIsland != 0){ ?>
      data.addRows([[3.87231,108.1604455, 'Kepulauan Riau', parseInt('<?php echo $riauIsland?>'),"<?php echo 'Total: '.$riauIsland?>"]]);
      <?php } if($seSulawesi != 0){ ?>
      data.addRows([[-3.850164,121.8852039, 'Sulawesi Tenggara', parseInt('<?php echo $seSulawesi?>'),"<?php echo 'Total: '.$seSulawesi?>"]]);
      <?php } if($southKalimantan != 0){ ?>
      data.addRows([[-3.029925,115.45091, 'Kalimantan Selatan', parseInt('<?php echo $southKalimantan?>'),"<?php echo 'Total: '.$southKalimantan?>"]]);
      <?php } if($southSulawesi != 0){ ?>
      data.addRows([[-4.8270885,119.4393624, 'Sulawesi Selatan', parseInt('<?php echo $southSulawesi?>'),"<?php echo 'Total: '.$southSulawesi?>"]]);
      <?php } if($southSumatra != 0){ ?>
      data.addRows([[-3.2753964,104.082144, 'Sumatera Selatan', parseInt('<?php echo $southSumatra?>'),"<?php echo 'Total: '.$southSumatra?>"]]);
      <?php } if($westJava != 0){ ?>
      data.addRows([[-6.8678485,107.605138, 'Jawa Barat', parseInt('<?php echo $westJava?>'),"<?php echo 'Total: '.$westJava?>"]]);
      <?php } if($westKalimantan != 0){ ?>
      data.addRows([[-0.51386,111.109948, 'Kalimantan Barat', parseInt('<?php echo $westKalimantan?>'),"<?php echo 'Total: '.$westKalimantan?>"]]);
      <?php } if($westNusaTenggara != 0){ ?>
      data.addRows([[-8.5949886,117.953844, 'Nusa Tenggara Barat', parseInt('<?php echo $westNusaTenggara?>'),"<?php echo 'Total: '.$westNusaTenggara?>"]]);
      <?php } if($westPapua != 0){ ?>
      data.addRows([[-1.624323,132.2789801, 'Papua Barat', parseInt('<?php echo $westPapua?>'),"<?php echo 'Total: '.$westPapua?>"]]);
      <?php } if($westSulawesi != 0){ ?>
      data.addRows([[-2.2102175,119.3151655, 'Sulawesi Barat', parseInt('<?php echo $westSulawesi?>'),"<?php echo 'Total: '.$westSulawesi?>"]]);
      <?php } if($westSumatra != 0){ ?>
      data.addRows([[-0.8492604,100.7777629, 'Sumatera Barat', parseInt('<?php echo $westSumatra?>'),"<?php echo 'Total: '.$westSumatra?>"]]);
      <?php } if($yogyakarta != 0){ ?>
      data.addRows([[-7.8730445,110.4242874, 'Yogyakarta', parseInt('<?php echo $yogyakarta?>'),"<?php echo 'Total: '.$yogyakarta?>"]]);
      <?php } ?>
       

          var geochart = new google.visualization.GeoChart(document.getElementById('mapDataChart'));

          var options = {
                      tooltip: { isHtml: true }, 
                      region: 'ID',
                      width:'1000px',
                      displayMode: 'markers',
                      enableRegionInteractivity: 'true',
                      resolution: 'provinces',
                      colorAxis: { colors: ['#FFD556', '#F47A00'] }
                  };
          geochart.draw(data, options);
      }

</script>

<?php
   require_once(getTemplatePath() . '/footer.php');
   } else {
    notAuthorized();
    //die('Anda Tidak Punya Akses!');
}  
?>