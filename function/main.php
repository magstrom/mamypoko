<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


ob_start();
if (!isset($_SESSION))
{
    session_start();
}

error_reporting( E_ALL );
ini_set( "display_errors", 1);
ini_set('display_startup_errors',1);

require_once($_SERVER['DOCUMENT_ROOT'].'/function/token/token.php');

function getAbsolutePath()
{
    return $_SERVER['DOCUMENT_ROOT'].'';
}
function getFunctionPath()
{
    return getAbsolutePath().'/function';
}
function getTemplatePath()
{
    return getAbsolutePath().'/template';
}
function getFormPath()
{
    return getAbsolutePath().'/form';
}
function getAssetPath()
{
    return getDomainRoot().'/assets';
}
function getDomainRoot()
{
    return $_SERVER['SERVER_NAME'];
}
function getHome()
{
    return getDomainRoot().'/view/dashboard.php';
}
// function getAPIBaseDomain()
// {
//     return 'https://c2c-api.azurewebsites.net';
// }
function getAPIBaseDomain()
{
    return 'http://mamypoko.cloudapp.net';
}
function getToken()
{
    return $_SESSION['token'];
}

function getLoggedID()
{
    return $_SESSION['id'];
}
function getLoggedName()
{
    return $_SESSION['name'];
}
function getLoggedUsername()
{
    return $_SESSION['username'];
}
function getLoggedEmail()
{
    return $_SESSION['email'];
}
function getLoggedLogo()
{
    return $_SESSION['logo'];
}
function getLoggedRole()
{
    return $_SESSION['role'];
}

function isAuthenticate()
{
    $session = 's';
    $cookie = 'c';
    //print_r($_COOKIE['token']);echo "<br>";exit();
    if(isset($_COOKIE['token']))
    {
        $cookie = $_COOKIE['token'];
    }
    if(isset($_SESSION['token']))
    {
        $session = $_SESSION['token'];
    }
    if(($cookie !== '') && ($cookie === $session) && ($session !== ''))
    {
        return true;
    }
    return false;
}
function notAuthorized()
{
    header('Location: /view/error.php');
}
function printPaging($totalItem, $itemsPerPage, $currentPage) {
    $currentRequest = getCurrentRequestURI($_SERVER['REQUEST_URI'], $_SERVER['PHP_SELF']);
    $setURI = '';
    if($currentRequest == '')
    {
        $setURI = $_SERVER['PHP_SELF'] . "?page=";
    }
    else
    {
        $setURI = $_SERVER['PHP_SELF'] . $currentRequest."&page=";
    }
    $nr = $totalItem;
    $lastPage = ceil($nr / $itemsPerPage);
    ?>
    <div class="pull-left">Halaman <?php echo $currentPage ?> dari <?php echo $lastPage ?></div>
    <div class="pull-right">
        <div class="paging-ic">
    <?php
    if ($lastPage <= 5) {
        for ($i = 1; $i <= $lastPage; $i++) {
            if($i == $currentPage)
            {
                echo "<a class='active' href=" . $setURI. $i . ">" . $i . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI. $i . ">" . $i . "</a>";
            }
        }
    } else {
        if ($currentPage >= 3) {
            $p1 = $currentPage - 2;
            $p2 = $currentPage - 1;
            $p3 = $currentPage;
            $p4 = $currentPage + 1;
            $p5 = $currentPage + 2;
            if($p5 >= $lastPage)
            {
                $p1 = $lastPage - 4;
                $p2 = $lastPage - 3;
                $p3 = $lastPage - 2;
                $p4 = $lastPage - 1;
                $p5 = $lastPage;
            }
            if($p5 <= 4)
            {
                $p1 = $currentPage;
                $p2 = $currentPage + 1;
                $p3 = $currentPage + 2;
                $p4 = $currentPage + 3;
                $p5 = $currentPage + 4;
            }
            
        } else {
            $p1 = $currentPage;
            $p2 = $p1 + 1;
            $p3 = $p2 + 1;
            $p4 = $p3 + 1;
            $p5 = $p4 + 1;
            if($currentPage < 5)
            {
                $p1 = 1;
                $p2 = $p1 + 1;
                $p3 = $p2 + 1;
                $p4 = $p3 + 1;
                $p5 = $p4 + 1;
            }
        }
        if(($p1 >= 3) || ($currentPage == 4))
        {
            echo "<a href=" . $setURI. "1>Halaman Pertama</a>";
        }
        if(($p1 != 0) && ($p1 <= $lastPage))
        {
            if($p1 == $currentPage)
            {
                echo "<a class = 'active' href=" . $setURI. $p1 . ">" . $p1 . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI . $p1 . ">" . $p1 . "</a>";
            }
            
        }
        if(($p2 != 0) && ($p2 <= $lastPage))
        {
            if($p2 == $currentPage)
            {
                echo "<a class='active' href=" . $setURI . $p2 . ">" . $p2 . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI. $p2 . ">" . $p2 . "</a>";
            }
            
        }
        if(($p3 != 0) && ($p3 <= $lastPage))
        {
            if($p3 == $currentPage)
            {
                echo "<a class='active' href=" . $setURI . $p3 . ">" . $p3 . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI. $p3 . ">" . $p3 . "</a>";
            }
            
        }
        if(($p4 != 0) && ($p4 <= $lastPage))
        {
            if($p4 == $currentPage)
            {
                echo "<a class='active' href=" . $setURI. $p4 . ">" . $p4 . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI. $p4 . ">" . $p4 . "</a>";
            }
            
        }
        if(($p5 != 0) && ($p5 <= $lastPage))
        {
            if($p5 == $currentPage)
            {
                echo "<a class='active' href=" . $setURI . $p5 . ">" . $p5 . "</a>";
            }
            else
            {
                echo "<a href=" . $setURI . $p5 . ">" . $p5 . "</a>";
            }
        }
        if($p5 <= ($lastPage - 1))
        {
            echo "<a href=" . $setURI.$lastPage. ">Halaman Terakhir</a>";
        }
    }
    ?>
        </div>
    </div>
    <?php
}

function getDefaultRow()
{
    return 20;
}
function getCurrentRequestURI($reqURI, $phpSelf)
{
    $pattern2 = "/ppage=[0-9]+$/";
    $pattern = "/&page=[0-9]+$/";
    $result = str_replace($phpSelf, '',$reqURI);
    $result = str_replace('?page', 'ppage', $result);
    $result = preg_replace($pattern, '', $result);
    $result = preg_replace($pattern2, '', $result);
    return $result;
}
function getCachePath()
{
    return getAbsolutePath().'/cache';
}