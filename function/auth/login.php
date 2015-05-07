<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/auth/auth.php');
//echo "masuk";exit();
$email = '';
$password = '';
if (isset($_GET["email"])) {
    $email = $_GET['email'];
}
if (isset($_GET['password'])) {
    $password = $_GET['password'];
}
//print_r($email);echo "<br>";exit();
// print_r($password);echo "<br>";exit();
if(($email == '') || ($password == ''))
{
    header("Location: /?login=error");
}
if(login($email, $password))
{
    header("Location: /view/dashboard.php");
}
