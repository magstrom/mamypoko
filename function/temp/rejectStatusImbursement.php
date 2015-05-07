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
$sendEmail = 'false';
// if(isset($_GET['id'])){
//         $idImbursement=$_GET['id'];
// }
if(isset($_POST['id'])){
        $idImbursement=$_POST['id'];
}
if(isset($_POST['notes'])){
        $notes=$_POST['notes'];
}
echo "idImbursement : ".$idImbursement."<br/>";
echo "notes :".$notes."</br>";
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

// if($idStatus == 1){
//  $newidStatus = 2;
// }elseif($idStatus == 2)
// {
//  $newidStatus = 3;
// }
$newidStatus = 9;
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
echo "sendEmail :".$sendEmail."</br>";
//echo "filename : ".$filename."<br/>";


if(updateImbursement($idImbursement, $name, $description, $idType, $cost, $idStatus, $approvedByNew, $image1, $imburseDate, $notes, $sendEmail))
{
    header("Location: /view/imbursement/manageImbursement.php?status=success&method=update");
}
else
{
    header("Location: /view/imbursement/manageImbursement.php?status=error");//belum di handle
}