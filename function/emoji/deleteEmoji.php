<?php
// /echo "masuk";exit();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/emoji/emoji.php');


$id='';


if (isset($_GET["id"])) {
    $id = $_GET['id'];
}
// echo "emoji: ".$id;echo "<br>";
// exit();
if(removeEmoji($id))
{
    header("Location: /view/emoji.php?status=success&method=delete");
}
else
{
    header("Location: /view/emoji.php?status=error");
}

?>