<?php
//echo "masuk";exit();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/sticker/sticker.php');


$id='';
$group = '';


if (isset($_GET["id"])) {
    $id = $_GET['id'];
}
if (isset($_GET["group"])) {
    $group = $_GET['group'];
}

echo "id :" .$id;echo "<br>";
echo "group :" .$group;echo "<br>";
//exit();

if(removeSticker($id))
{
    header("Location: /view/sticker.php?id=".$group."&status=success&method=delete");
}
else
{
    header("Location: /view/sticker.php?id=".$group."&status=error");//belum di handle
}
?>