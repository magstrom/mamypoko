<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/user/user.php');
//echo "masuk";exit();
$username = '';
$password = '';
$name = '';
$email = '';
$idRole = '';
$phone = '';
$avatar = '';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $username = md5($email);
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['role'])) {
    $idRole = $_POST['role'];
}
echo "idRole :" .$idRole;echo "<br>";
$roledata = getStaffRoleName($idRole);
$rolename = $roledata[0]['name'];
echo "rolename :" .$rolename;echo "<br>";
//print_r($roledata);exit();
//echo "masuk";exit();
echo "Name :" .$name;echo "<br>";
echo "email :" .$email;echo "<br>";
echo "phone :" .$phone;echo "<br>";
echo "username :" .$username;echo "<br>";
echo "password :" .$password;echo "<br>";
echo "idRole :" .$idRole;echo "<br>";

if(addUser($username, $password, $rolename, $idRole, $email, $phone, $avatar,$name))
{
    header("Location: /view/staff/manageStaff.php?status=success&method=add");
}
else
{
    header("Location: /view/staff/manageStaff.php.php?status=error");//belum di handle
}