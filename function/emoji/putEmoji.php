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
$id = '';
$oldemoji = '';


$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    //$username = md5($firstname);
}
if (isset($_POST['oldemoji'])) {
    $oldemoji = $_POST['oldemoji'];
    //$username = md5($firstname);
}



//$image = $location;
if(empty($filename)){
	header("Location: /view/emoji.php?status=success&method=update");
}else{
	 echo "id :" .$id;echo "<br>";
	 echo "oldemoji :" .$oldemoji;echo "<br>";
	 echo "filename :" .$filename;echo "<br>";
	 echo "filedata :" .$filedata;echo "<br>";
	 //exit();
	if(updateEmoji($id,$filename,$filedata))
	{
	    header("Location: /view/emoji.php?status=success&method=update");
	}
	else
	{
	    header("Location: /view/emoji.php?status=error");//belum di handle
	}
}

?>