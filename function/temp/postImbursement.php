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

$idUser = '';
$name = '';
$description = '';
$idType = '';
$cost = '';
$createdBy = '';
$image1 = '';



if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['imburseDate'])) {
    $imburseDate = $_POST['imburseDate'];
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
$idUser = getUserID();
$nameUser = getUserName();

$today = date("Ymdhms");
//$user = getUser($idUser, null, null, null);
//$username = json_decode($user);
$nameUser = str_replace(' ', '_', $nameUser);
// $date = new DateTime('now');

$filename = $nameUser.'_'.$idType.'_'.$today.'.jpg';
//print_r($filename);exit();

$uploaddir = getAbsolutePath(). '/uploads/images/reimburst/';
$uploadfile = $uploaddir . $filename;
//print_r($uploadfile);exit();
$filepath = getDomainRoot().'/uploads/images/reimburst/'.$filename;
$image1 = "http://".$filepath;
echo "<p>";

if(($_FILES['file']['size'] >= 1097152) || ($_FILES["file"]["size"] == 0)) {
        echo "Upload failed, please upload image undeer 1 MB";echo "<br>";exit();
    }

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";echo "<br>";
} else {
   echo "Upload failed";echo "<br>";
}

echo "imburseDate : ".$imburseDate."<br/>";
echo "createdByNew : ".$idUser."<br/>";
echo "name : ".$name."<br />";
echo "image :".$image1."</br>";
echo "description : ".$description."<br/>";
echo "idType : ".$idType."<br/>";
echo "filename : ".$filename."<br/>";
echo "cost : ".$cost."<br />";

if(addImbursement($idUser, $name, $description, $idType, $cost, $image1, $imburseDate))
{
    header("Location: /view/imbursement/manageImbursement.php?status=success&method=add");
}
else
{
    header("Location: /view/imbursement/manageImbursement.php?status=error");//belum di handle
}