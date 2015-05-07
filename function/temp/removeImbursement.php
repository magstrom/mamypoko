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
require_once(getFunctionPath().'/imbursement/imbursement.php');

//echo "masuk";exit();
$idProduct = '';
$isActive = 'False';

if(isset($_GET['id'])){
        $id=$_GET['id'];
}

echo "idProduct :" .$id;echo "<br>";
echo "isActive :" .$isActive;echo "<br>";


if(removeImbursement($id, $isActive))
{
    header("Location: /view/imbursement/manageImbursement.php?status=success&method=delete");
}
else
{
    header("Location: /view/imbursement/manageImbursement.php?status=error");//belum di handle
}