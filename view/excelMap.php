<?php ob_start();  
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath() . '/account/account.php'); 
require_once(getFunctionPath() . '/common/utilities.php');

$account = getAccount();
$data = $account['accounts'];

echo "No,aceh,bali,belitung,banten,bengkulu,centralJava,centralKalimantan,centralSulawesi,eastJava,eastKalimantan,eastNusaTenggara,gorontalo,jakarta,jambi,lampung,maluku,northKalimantan,northMaluku,northSulawesi,northSumatra,papua,riau,riauIsland,seSulawesi,southKalimantan,southSulawesi,southSumatra,westJava,westKalimantan,westNusaTenggara,westPapua,westSulawesi,westSumatra,yogyakarta, \r";
$index = 0;
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
	$index = $index + 1;
	echo $index.',';
	echo $aceh.',';
	echo $bali.',';
	echo $belitung.',';
	echo $banten.',';
	echo $bengkulu.',';
	echo $centralJava.',';
	echo $centralKalimantan.',';
	echo $centralSulawesi.',';
	echo $eastJava.',';
	echo $eastKalimantan.',';
	echo $eastNusaTenggara.',';
	echo $gorontalo.',';
	echo $jakarta.',';
	echo $jambi.',';
	echo $lampung.',';
	echo $maluku.',';
	echo $northKalimantan.',';
	echo $northMaluku.',';
	echo $northSulawesi.',';
	echo $northSumatra.',';
	echo $papua.',';
	echo $riau.',';
	echo $riauIsland.',';
	echo $seSulawesi.',';
	echo $southKalimantan.',';
	echo $southSulawesi.',';
	echo $southSumatra.',';
	echo $westJava.',';
	echo $westKalimantan.',';
	echo $westNusaTenggara.',';
	echo $westPapua.',';
	echo $westSulawesi.',';
	echo $westSumatra.',';
	echo $yogyakarta.',';	
	echo "\r";  
$today = date('m/d/Y');

$filename = 'UserLocation_'.date("Y-m-d_H-i",time());
header( 'Content-Type: text/csv' );  
header( 'Content-Disposition: attachment;filename='.$filename.'.csv' );  
ob_flush(); ?> 
