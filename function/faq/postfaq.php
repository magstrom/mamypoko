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
require_once(getFunctionPath().'/faq/faq.php');

//echo "masuk";exit();
$title = '';
$content = '';


if (isset($_POST['title'])) {
    $title = $_POST['title'];
    //$username = md5($firstname);
}
if (isset($_POST['content'])) {
    $content = $_POST['content'];
}

if(addFaq($title, $content))
{
    header("Location: /view/faq.php?status=success&method=add");
}
else
{
    header("Location: /view/faq.php?status=error");//belum di handle
}