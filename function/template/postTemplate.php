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
require_once(getFunctionPath().'/template/template.php');

//echo "masuk";exit();
$name = '';
$description = '';


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    //$username = md5($firstname);
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}


// echo "name :" .$name;echo "<br>";
// echo "description :" .$description;echo "<br>";

// exit();


if(addTemplate($name, $description))
{
    header("Location: /view/template.php?status=success&method=add");
}
else
{
    header("Location: /view/template.php?status=error");//belum di handle
}