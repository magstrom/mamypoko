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
require_once(getFunctionPath().'/stickerGroup/stickerGroup.php');


$idStickerGroup='';


if (isset($_GET["id"])) {
    $idStickerGroup = $_GET['id'];
}

if(removeStickerGroup($idStickerGroup))
{
    header("Location: /view/stickerGroup.php?status=success&method=delete");
}
else
{
    header("Location: /view/stickerGroup.php?status=error");
}

?>