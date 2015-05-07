<?php
//echo "masuk";exit();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/function/main.php');
//echo "ada";

$idStickerGroup='';
$group = '';

if (isset($_GET["id"])) {
    $idSticker = $_GET['id'];
}
if (isset($_GET["group"])) {
    $group = $_GET['group'];
}

echo "idSticker = ".$idSticker.echo "<br>";
echo "group = ".$group.echo "<br>";
exit();

if(addSticker($name, $filename, $filedata, $id))
{
    header("Location: /view/sticker.php?id=".$id."&status=success&method=delete");
}
else
{
    header("Location: /view/sticker.php?id=".$id."&status=error");//belum di handle
}

?>