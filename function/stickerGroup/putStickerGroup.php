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


$id = '';
$idSticker = '';
$name = '';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['idSticker'])) {
    $idSticker = $_POST['idSticker'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

// $filename = $_FILES['image']['name'];
// $filedata = $_FILES['image']['tmp_name'];

echo "id :" .$id;echo "<br>";
echo "idSticker :" .$idSticker;echo "<br>";
echo "name :" .$name;echo "<br>";
//echo "image :" .$image;echo "<br>";
// echo "oldimage :" .$oldimage;echo "<br>";
// echo "filename :" .$filename;echo "<br>";
// echo "filedata :" .$filedata;echo "<br>";
// exit();

if(updateStickerGroup($name, $idSticker))
{
    header("Location: /view/stickerGroup.php?status=success&method=update");
}
else
{
    header("Location: /view/stickerGroup.php?status=error");//belum di handle
}
?>