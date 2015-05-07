<?php ob_start();  
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath() . '/account/account.php');
require_once(getFunctionPath() . '/statistic/statistic.php'); 
require_once(getFunctionPath() . '/common/utilities.php');

$account = getAccount();
$friend = getStatisticFriend();
$data = $account['accounts'];

echo "No, Full Name, Friend \r";
$index = 0;
foreach ($friend as $friendData) {
$index = $index + 1;
                 	
	echo $index.',';
	echo $friendData['profile']['name'].',';
	echo $friendData['total'].',';
	echo "\r";
}
$today = date('m/d/Y');

$filename = 'Top User FriendList_'.date("Y-m-d_H-i",time());
header( 'Content-Type: text/csv' );  
header( 'Content-Disposition: attachment;filename='.$filename.'.csv' );  
ob_flush(); ?> 
