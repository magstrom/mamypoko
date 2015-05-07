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
require_once(getFunctionPath().'/layout/layout.php');

//echo "masuk";exit();
$id = '';
$title = '';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    //$username = md5($firstname);
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    //$username = md5($firstname);
}

$filename = $_FILES['image']['name'];
$filedata = $_FILES['image']['tmp_name'];

if (isset($_POST['x'])) {
    $arrayX[] = $_POST['x'];
}
if (isset($_POST['y'])) {
    $arrayY[] = $_POST['y'];
}
if (isset($_POST['height'])) {
    $arrayHeight[] = $_POST['height'];
}
if (isset($_POST['width'])) {
    $arrayWidth[] = $_POST['width'];
}
if (isset($_POST['rotation'])) {
    $arrayRotation[] = $_POST['rotation'];
}

array_pop($arrayX[0]);
$arrayX = $arrayX[0];

array_pop($arrayY[0]);
$arrayY = $arrayY[0];

array_pop($arrayHeight[0]);
$arrayHeight = $arrayHeight[0];

array_pop($arrayWidth[0]);
$arrayWidth = $arrayWidth[0];

array_pop($arrayRotation[0]);
$arrayRotation = $arrayRotation[0];

echo "id :" .$id;echo "<br>";
echo "title :" .$title;echo "<br>";
echo "filename :" .$filename;echo "<br>";
echo "filedata :" .$filedata;echo "<br>";
print_r($arrayX);echo "<br>";
print_r($arrayY);echo "<br>";
print_r($arrayHeight);echo "<br>";
print_r($arrayWidth);echo "<br>";
print_r($arrayRotation);echo "<br>";
$total = count($arrayY);

for($i = 0;$i<$total;$i++){
$position = array(
	        'x' => (int)$arrayX[$i],
            'y' => (int)$arrayY[$i],
            'width' => (int)$arrayWidth[$i],
            'height' => (int)$arrayHeight[$i],
            'rotation' => (int)$arrayRotation[$i]);
$arrayPos[] = $position;
}
//$position = json_encode($position);

echo "<br>";
$itemUpdate = array(
	'name'=>$title,
	'total_photo' => $total,
	'positions' => $arrayPos
	);
//print_r(json_encode($item,true));echo "<br>";
//print_r($itemUpdate);echo "<br>";
//exit();


if(addLayout($title, $id,$filedata, $filename,$itemUpdate))
{
    header("Location: /view/layout.php?id=".$id."&status=success&method=add");
}
else
{
    header("Location: /view/layout.php?id=".$id."&status=error");//belum di handle
}