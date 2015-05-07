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
require_once(getFunctionPath().'/emoji/emoji.php');

//echo "masuk";exit();
$name = '';


$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    //$username = md5($firstname);
}

 echo "name :" .$name;echo "<br>";
 echo "filename :" .$filename;echo "<br>";
 echo "filedata :" .$filedata;echo "<br>";

//exit();
//$image = $location;

if(addEmoji($name, $filename, $filedata))
{
    header("Location: /view/emoji.php?status=success&method=add");
}
else
{
    header("Location: /view/emoji.php?status=error");//belum di handle
}