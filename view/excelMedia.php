<?php ob_start();  
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath() . '/account/account.php');
require_once(getFunctionPath() . '/statistic/statistic.php'); 
require_once(getFunctionPath() . '/common/utilities.php');

$account = getAccount();
$friend = getStatisticFriend();
$data = $account['accounts'];

echo "No, Full Name, Media \r";
$index = 0;
$media = getStatisticMedia();
foreach ($media as $mediaData) {
$index = $index + 1;
                 	
	echo $index.',';
	echo $mediaData['profile']['name'].',';
	echo $mediaData['total'].',';
	echo "\r";
}
$today = date('m/d/Y');

$filename = 'Top User MediaList_'.date("Y-m-d_H-i",time());
header( 'Content-Type: text/csv' );  
header( 'Content-Disposition: attachment;filename='.$filename.'.csv' );  
ob_flush(); ?> 
