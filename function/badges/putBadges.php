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
$id = '';
$name = '';
$description = '';
$category = '';
$number='';

$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];


if (isset($_POST['title'])) {
    $name = $_POST['title'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['number'])) {
    $number = $_POST['number'];
}






 echo "id :" .$id;echo "<br>";
 echo "name :" .$name;echo "<br>";
 echo "description :" .$description;echo "<br>";
 echo "category :" .$category;echo "<br>";
 echo "number :" .$number;echo "<br>";

 echo "filename :" .$filename;echo "<br>";
 echo "filedata :" .$filedata;echo "<br>";
// exit();

$image = curl_file_create($filedata,'image/png',$filename);

if(empty($filename)){
$item = array (
        'name' => $name,
        'description'=> $description,
        'category'=> $category,
        'target'=> $number
    );
}elseif(!empty($filename)){
	$item = array (
        'name' => $name,
        'description'=> $description,
        'category'=> $category,
        'target'=> $number,
        'image' => $image
    );
}



if(updateBadges($id,$item))
{
    header("Location: /view/badge.php?status=success&method=update"); }
else
{
  //  header("Location: /view/badge.php?status=error");//belum di handle
}


