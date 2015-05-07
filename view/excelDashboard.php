<?php ob_start();  
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath() . '/account/account.php'); 
require_once(getFunctionPath() . '/common/utilities.php');

$account = getAccount();
$data = $account['accounts'];

echo "No, Full Name, Email, Phone, Baby, Address, Province \r";
$index = 0;
foreach ($data as $item) {
	//print_r($item);exit();
                 	$baby = $item['babies'];
                 	$index = $index + 1;
                 	$jumlahBaby = count($baby);
                    $phone = str_replace("+62", "0", $item['phone']);
                    //$address = str_replace(",", " ", $item['address']);
	echo $index.',';
	echo $item['name'].',';
	echo $item['email'].',';
	echo $phone.',';
	if(empty($baby)){
	echo '0,';
	}else{ 
	echo $jumlahBaby.',';
	}
	if(empty($item['address'])){
	echo '-,';
	}else{ 
	echo $item['address'].',';
	}
	if(empty($item['province'])){
	echo '-,';
	}else{ 
	echo $item['province'].',';
	}
	echo "\r";
}
$today = date('m/d/Y');

$filename = 'UserList_'.date("Y-m-d_H-i",time());
header( 'Content-Type: text/csv' );  
header( 'Content-Disposition: attachment;filename='.$filename.'.csv' );  
ob_flush(); ?> 
