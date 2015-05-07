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
$name = '';
$template = '';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    //$username = md5($firstname);
}
if (isset($_POST['title'])) {
    $name = $_POST['title'];
    //$username = md5($firstname);
}
if (isset($_POST['template'])) {
    $templateID = $_POST['template'];
    //$username = md5($firstname);
}


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



echo "id :" .$id;echo "<br>";
echo "name :" .$name;echo "<br>";
print_r($arrayX[0]);echo "<br>";
print_r($arrayY[0]);echo "<br>";
print_r($arrayHeight[0]);echo "<br>";
print_r($arrayWidth[0]);echo "<br>";
print_r($arrayRotation[0]);echo "<br>";
$total = count($arrayY[0]);
//print_r($total);echo "<br>";
for($i = 0;$i<$total;$i++){
//print_r($i);echo "<br>";
$position = array(
	        'x' => (int)$arrayX[0][$i],
            'y' => (int)$arrayY[0][$i],
            'width' => (int)$arrayWidth[0][$i],
            'height' => (int)$arrayHeight[0][$i],
            'rotation' => (int)$arrayRotation[0][$i]);
$arrayPos[] = $position;
}
//$position = json_encode($position);

echo "<br>";
$itemUpdate = array(
	'name'=>$name,
	'total_photo' => $total,
	'positions' => $arrayPos
	);
//print_r(json_encode($item,true));echo "<br>";
// print_r($templateID);echo "<br>";
// exit();


if(updateLayout($id, $itemUpdate, $templateID))
{
    header("Location: /view/layout.php?id=".$templateID."&status=success&method=update");
}
else
{
    header("Location: /view/layout.php?id=".$templateID."&status=error");//belum di handle
}
?>