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
require_once(getFunctionPath().'/sticker/sticker.php');


$id = '';
$idSticker = '';
$name = '';
$image='';
$oldimage='';


if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['idSticker'])) {
    $idSticker = $_POST['idSticker'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
// if (isset($_POST['image'])) {
//     $image = $_POST['image'];
// }
if (isset($_POST['oldimage'])) {
    $oldimage = $_POST['oldimage'];
}
$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
// $filename = $_FILES['image']['name'];
// $filedata = $_FILES['image']['tmp_name'];

echo "id :" .$id;echo "<br>";
echo "idSticker :" .$idSticker;echo "<br>";
echo "name :" .$name;echo "<br>";
$image = curl_file_create($filedata,'image/png',$filename);

if(empty($filename)){
  echo "image kosong";echo "<br>";
    $item = array (
        'name' => $name,
        'sticker_group_id' => $id
    );
  //print_r($item);echo "<br>";
 }else{
 	  echo "ada Image";echo "<br>";
    $item = array (
        'name' => $name,
        'sticker_group_id' => $id,
        'image' => $image
    );
  //print_r($item);echo "<br>";
 }
 //exit();

if(updateSticker($idSticker, $item))
{
    header("Location: /view/sticker.php?id=".$id."&status=success&method=update");
}
else
{
    header("Location: /view/sticker.php?id=".$id."&status=error");//belum di handle
}
?>