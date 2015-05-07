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
$approvedBy = '';

if (isset($_POST['id'])) {
    $idImbursement = $_POST['id'];
}
if (isset($_POST['createdByNew'])) {
    $createdByNew = $_POST['createdByNew'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['idType'])) {
    $idType = $_POST['idType'];
}

if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
}
if (isset($_POST['oldimage'])) {
    $oldimage = $_POST['oldimage'];
}
if (isset($_POST['idStatus'])) {
    $idStatus = $_POST['idStatus'];
}
if (isset($_POST['imburseDate'])) {
    $imburseDate = $_POST['imburseDate'];
}

$approvedByNew = getUserID();
$today = date("Ymdhms");
$idUser = getUserID();
$nameUser = getUserName();

$username = str_replace(' ', '_', $nameUser);

// $date = new DateTime('now');

$filename = $username.'_'.$idType.'_'.$today.'.jpg';
//print_r($filename);exit();

$uploaddir = getAbsolutePath(). '/uploads/images/reimburst/';
$uploadfile = $uploaddir . $filename;
//print_r($uploadfile);exit();
$filepath = getDomainRoot().'/uploads/images/reimburst/'.$filename;
$image1 = "http://".$filepath;
echo "<p>";

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";echo "<br>";
   $upload = 'ok';
} else {
   echo "Upload failed";echo "<br>";
   $upload = 'ko';
}

if($upload == 'ko'){
    $image1 = $oldimage;
}

if($idStatus == 9){
  $idStatus = 10;
}
$notes = '';
echo "imburseDate : ".$imburseDate."<br/>";
echo "upload :" .$upload;echo "<br>";
echo "idImbursement : ".$idImbursement."<br/>";
echo "createdByNew : ".$createdByNew."<br/>";
echo "name : ".$name."<br />";
echo "description : ".$description."<br/>";
echo "idType : ".$idType."<br/>";
echo "cost : ".$cost."<br />";
echo "idStatus : ".$idStatus."<br/>";
echo "newidStatus : ".$newidStatus."<br/>";

echo "approvedBy : ".$approvedBy."<br/>";
echo "OLD image :".$oldimage."</br>";
echo "image :".$image1."</br>";



echo "filename : ".$filename."<br/>";


if(updateImbursement($idImbursement, $name, $description, $idType, $cost, $idStatus, $approvedByNew, $image1, $imburseDate, $notes))
{
    header("Location: /view/imbursement/manageImbursement.php?status=success&method=update");
}
else
{
    header("Location: /view/imbursement/manageImbursement.php?status=error");//belum di handle
}