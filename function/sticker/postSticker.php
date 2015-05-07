<?php
// echo "masuk";exit();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/sticker/sticker.php');
require_once(getFunctionPath().'/stickerGroup/stickerGroup.php');


$name = '';
$image = '';
$id='';
$sticker='';




$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
// $filename = $_FILES['image']['name'];
// $filedata = $_FILES['image']['tmp_name'];
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['image'])) {
    $image = $_POST['image'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

echo "id :" .$id;echo "<br>";
echo "name :" .$name;echo "<br>";
echo "filename :" .$filename;echo "<br>";
echo "filedata :" .$filedata;echo "<br>";
//exit();

if(addSticker($name, $filename, $filedata, $id))
{
    header("Location: /view/sticker.php?id=".$id."&status=success&method=add");
}
else
{
    header("Location: /view/sticker.php?id=".$id."&status=error");//belum di handle
}
?>