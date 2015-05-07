<?php
//echo "masuk";exit();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/client/client.php');

//echo "masuk";exit();
$id = '';
$username = '';
$name = '';
$email = '';
$phone = '';
$fax = '';
$businessSector = '';
$logo = '';
$description = '';
$updatedBy = '';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
//print_r($id);exit();
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}

if (isset($_POST['fax'])) {
    $fax = $_POST['fax'];
}
if (isset($_POST['businessSector'])) {
    $businessSector = $_POST['businessSector'];
}
if (isset($_POST['oldLogo'])) {
    $oldLogo = $_POST['oldLogo'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}


$today = date("Ymdhms");
$idUser = getClientID();
$nameUser = getClientName();
//print_r($nameUser);exit();
$clientname = str_replace(' ', '_', $nameUser);

// $date = new DateTime('now');

$filename = $clientname.'_'.$idType.'_'.$today.'.jpg';
//print_r($filename);exit();

$uploaddir = getAbsolutePath(). '/uploads/logo/';
$uploadfile = $uploaddir . $filename;
//print_r($uploadfile);exit();
$filepath = getDomainRoot().'/uploads/logo/'.$filename;
$image1 = "http://".$filepath;
//
echo "<p>";

if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";echo "<br>";
   $upload = 'ok';
} else {
   echo "Upload failed";echo "<br>";
   $upload = 'ko';
}

if($upload == 'ko'){
    $image1 = $oldLogo;
}
$logo = $image1;
echo "id : ".$id."<br/>";
echo "upload :" .$upload;echo "<br>";
echo "username : ".$username."<br/>";
echo "name : ".$name."<br />";
echo "email : ".$email."<br/>";
echo "phone : ".$phone."<br/>";
echo "fax : ".$fax."<br />";
echo "businessSector : ".$businessSector."<br/>";
echo "oldLogo : ".$oldLogo."<br/>";

echo "image1 : ".$image1."<br/>";
echo "description :".$description."</br>";


if(updateClient($id, $username, $name, $email, $phone, $fax, $businessSector, $description, $logo))
{
    header("Location: /view/profile/edit.php?status=success&method=update");
}
else
{
    header("Location: /view/profile/edit.php?status=error");//belum di handle
}