<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/imbursement/imbursement.php');
    require_once(getFunctionPath() . '/user/user.php');
    require_once(getFunctionPath() . '/type/type.php');
require_once(getFunctionPath().'/token/token.php');
require_once(getFunctionPath().'/common/email.php');

//echo "masuk";exit();
$idImbursement = '';
$idUser = '';
$name = '';
$description = '';
$idType = '';
$cost = '';
$createdBy = '';
$image1 = '';
$approvedByNew = '';
$notes = '';

if(isset($_GET['id'])){
        $idImbursement=$_GET['id'];
}
if(isset($_POST['notes'])){
        $notes=$_POST['notes'];
}
if(isset($_GET['sendEmail'])){
        $sendEmail=$_GET['sendEmail'];
}
echo "idImbursement : ".$idImbursement."<br/>";   
$imbursement =  getImbursement($idImbursement, null, null, null, null, null, null, null, null);
//print_r($imbursement);exit();

$idImbursement = $imbursement[0]['idImbursement'];
$idUser = $imbursement[0]['createdByNew'];
$name = $imbursement[0]['name'];
$description = $imbursement[0]['description'];
$idType = $imbursement[0]['idType'];
$cost = $imbursement[0]['cost'];
$idStatus = $imbursement[0]['idStatus'];
$approvedByNew = $imbursement[0]['approvedByNew'];
$image1 = $imbursement[0]['image1'];
$imburseDate = $imbursement[0]['imburseDate'];

echo "idStatus sebelumnya : ".$idStatus."<br/>";

if($idStatus == 1 || $idStatus == 10){
 $newidStatus = 2;
}elseif($idStatus == 2)
{
 $newidStatus = 3;
}

$approvedByNew = getUserID();
$idStatus = $newidStatus;

echo "imburseDate : ".$imburseDate."<br/>";
echo "idUser : ".$idUser."<br/>";
echo "name : ".$name."<br />";
echo "description : ".$description."<br/>";
echo "idType : ".$idType."<br/>";
echo "cost : ".$cost."<br />";
echo "idStatus : ".$idStatus."<br/>";
echo "new idStatus : ".$newidStatus."<br/>";

echo "approvedByNew : ".$approvedByNew."<br/>";

echo "image :".$image1."</br>";
echo "notes :".$notes."</br>";


echo "<br>";
echo "sendEmail :".$sendEmail."</br>";

if($sendEmail == 'true'){
	$email = 1;
}else{
	$email = 0;
}
echo "email : ".$email."<br/>";


if(updateImbursement($idImbursement, $name, $description, $idType, $cost, $idStatus, $approvedByNew, $image1, $imburseDate))
{
	if($email == 1){

			$user = getAuthToken($idUser);
		    $namaUser = $user[0]['displayName'];
		    $emailUser = $user[0]['userName'];

            $to = 'dedyli@zenith.co.id';
            $subject = "Reimbursement telah di-Approve";
            
            $html = file_get_contents('http://expenses.zenith.co.id/function/imbursement/emailApprove.html');
            //str_replace(search, replace, subject)
            $html = str_replace('@user',$namaUser, $html);
            $html = str_replace('@email',$emailUser, $html);
            $html = str_replace('@date', $imburseDate, $html);
            $html = str_replace('@name', $name, $html);
            $html = str_replace('@description', $description,  $html);
            $html = str_replace('@cost', $cost, $html);
            $html = str_replace('@image',$image1, $html);
            $message = $html;
            
            if(sendEmail($to, $subject, $message) == 'OK')
            {
                echo "Email Sukses Dikirim";
            }
            else 
            {
                echo "Email gagal Dikirim";
            }
      
	}
    header("Location: /view/imbursement/manageImbursement.php?status=success&method=update");
}
else
{
    header("Location: /view/imbursement/manageImbursement.php?status=error");//belum di handle
}