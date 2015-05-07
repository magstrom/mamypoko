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
require_once(getFunctionPath().'/badges/badges.php');

//echo "masuk";exit();
$name = '';
$description = '';
$image = '';
$category='';
$number='';

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    //$username = md5($firstname);
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['number'])) {
    $number = $_POST['number'];
}

$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];


// echo "title :" .$title;echo "<br>";
// echo "description :" .$description;echo "<br>";
// echo "category :" .$category;echo "<br>";
// echo "number :" .$number;echo "<br>";
// echo "filename :" .$filename;echo "<br>";
// echo "filedata :" .$filedata;echo "<br>";
//exit();

if(addBadges($filename, $filedata, $title,$description,$category,$number))
{
    header("Location: /view/badge.php?status=success&method=add");
}
else
{
    header("Location: /view/badge.php?status=error");//belum di handle
}