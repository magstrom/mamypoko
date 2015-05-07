<?php
//echo "masuk";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/stickerGroup/stickerGroup.php');

//echo "masuk";exit();
$name = '';
$image = '';
$stickerName='';
$sticker='';

$handle = ($_FILES["image"]["tmp_name"]);;
$uploadfile = ($_FILES['image']['name']);
$location = $handle.'/'.$uploadfile;


$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
//print_r($handle.'/'.$uploadfile);exit();
// $uploaddir = realpath('./') . '/';
// $uploadfile = $uploaddir . basename($_FILES['image']['name']);
// print_r($uploadfile);exit();

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    //$username = md5($firstname);
}
if (isset($_POST['image'])) {
    $image = $_POST['image'];
}
if (isset($_POST['stickerName'])) {
   $stickerName = implode ('&', $_POST['stickerName']);
}
if (isset($_POST['sticker'])) {
    $sticker = implode ('&', $_FILES['image']['tmp_name']);
}

if(count($_FILES['sticker']['tmp_name'])) {
	foreach ($_FILES['sticker']['tmp_name'] as $file) {
	    
		$arrayTemp[] = $file;
		//echo $file;echo "<br>";
		
	}
}
$stickerNameExplode = explode("&", $stickerName);
$stickerExplode = explode("&", $sticker);
foreach($stickerNameExplode as $v)
{
	$arrayNama[] = $v;
    //echo $v;echo "<br>";
}
array_pop($arrayTemp);
array_pop($arrayNama);

//print_r($arrayTemp);echo "<br>";
$jumlahArray = count($arrayTemp);
// echo "name :" .$name;echo "<br>";
// echo "handle :" .$handle;echo "<br>";
// echo "image :" .$image;echo "<br>";
// //echo "stickerName :" .$arrayNama;echo "<br>";
// echo "sticker :" .$arrayTemp;echo "<br>";
// echo "stickerNameExplode :" .$stickerNameExplode;echo "<br>";
// echo "stickerExplode :" .$stickerExplode;echo "<br>";
//print_r($jumlahArray);exit();
//exit();
$image = $location;

if(addStickerGroup($name,$filename, $filedata, $arrayNama, $arrayTemp, $jumlahArray))
{
    header("Location: /view/stickerGroup.php?status=success&method=add");
}
else
{
    header("Location: /view/stickerGroup.php?status=error");//belum di handle
}