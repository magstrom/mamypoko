<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/RBS/RBS.php');
//echo "masuk";exit();
$idRBS = '';
$nameDelete = '';
$isActive = 0;

if (isset($_POST['nameDelete'])) {
    $nameDelete = $_POST['nameDelete'];

	$RBS = getRBS(null, $nameDelete, null);
	$RBS = $RBS[0];

    $idRBS = $RBS["idRBS"];
}
/*echo "username : ".$username."<br/>";
echo "idRBS : ".$idRBS."<br />";
exit();*/

if(toggleRBS($idRBS, $isActive, getUserID()))
{
    header("Location: /view/RBS/manageRBS.php?status=success&method=add");
}
else
{
    header("Location: /view/RBS/manageRBS.php?status=error");//belum di handle
}