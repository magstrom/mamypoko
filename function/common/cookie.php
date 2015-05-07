<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCookieValue($cookieName)
{
    $cookie = "KO";
    if(!isset($_COOKIE[$cookieName]))
    {
        return "KO";
    }
    else
    {
        $cookie = $_COOKIE[$cookieName];
        return $cookie;
    }
}
function setCookieValue($name, $value, $duration)
{
    setcookie($name, $value, time()+$duration, "/", ".zenith.co.id");
    return "OK";
}
function deleteAllCookie()
{
    
}