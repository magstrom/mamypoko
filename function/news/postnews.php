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
require_once(getFunctionPath().'/news/news.php');

//echo "masuk";exit();
$name = '';
$content = '';
//$media = '';

$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];

$filenamevideo = $_FILES['video']['name'];
$filedatavideo = $_FILES['video']['tmp_name'];
$filesizevideo = $_FILES['video']['size'];


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    //$username = md5($firstname);
}
if (isset($_POST['content'])) {
    $content = $_POST['content'];
    //$username = md5($firstname);
}
echo "name :" .$name;echo "<br>";
echo "content :" .$content;echo "<br>";
echo "filename :" .$filename;echo "<br>";
echo "filedata :" .$filedata;echo "<br>";

echo "filenamevideo :" .$filenamevideo;echo "<br>";
echo "filedatavideo :" .$filedatavideo;echo "<br>";
//exit();
 $image = curl_file_create($filedata,'image/png',$filename);
 $video = curl_file_create($filedatavideo,'video/mp4',$filenamevideo);


 if (empty($filename) && empty($filenamevideo)) {
 	 $item = array (
        'name' => $name,
        'content'=> $content
    );
 	echo "video dan image kosong";echo "<br>";
 	print_r($item);echo "<br>";
 }
 elseif(!empty($filename) && !empty($filenamevideo)){
 	echo "video dan image diisi";echo "<br>";
 	 	 $item = array (
        'name' => $name,
        'content'=> $content,
        'image' => $image,
        'video' => $video
    );
 	print_r($item);echo "<br>";
 }elseif(empty($filename)){
 	echo "image kosong";echo "<br>";
 	 	 $item = array (
        'name' => $name,
        'content'=> $content,
        'video' => $video
    );
 	print_r($item);echo "<br>";
 }elseif (empty($filenamevideo)) {
 	echo "video kosong";echo "<br>";
 	 	 $item = array (
        'name' => $name,
        'content'=> $content,
        'image' => $image
    );
 	print_r($item);echo "<br>";
 }
 echo "<br>";
// exit();
if(addNews($item))
{
    header("Location: /view/news.php?status=success&method=add");
}
else
{
    header("Location: /view/news.php?status=error");//belum di handle
}