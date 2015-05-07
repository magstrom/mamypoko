<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function printDate($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    $date->modify('+7 hours');
    return date_format($date, 'd M Y');
    
}

function printDateNoPlus($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    //$date->modify('+7 hours');
    return date_format($date, 'd M Y');
    
}

function printDateTimeNoPlus($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    //$date->modify('+7 hours');
    return date_format($date, 'd M Y H:i:s');
    
}
function printDateTime($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    $date->modify('+7 hours');
    return date_format($date, 'd M Y H:i:s');
    
}
function printTime($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    $date->modify('+7 hours');
    return date_format($date, 'H:i:s');
}

function printTimeAMPM($dateString)
{
    $timezone = 'Asia/Jakarta';
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    $date->modify('+7 hours');
    return date_format($date, 'H:i A');
}
function printUnixTimestamp($timestamp)
{
    $timezone = 'Asia/Jakarta';
    $epoch = round($timestamp / 1000);
    $date = new DateTime("@$epoch", new DateTimeZone($timezone));  // convert UNIX timestamp to PHP DateTime
    $date->modify('+7 hours');
    return date_format($date, "d M Y H:i:s"); // output = 2012-08-15 00:00:00 
}
function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['logDate'] === $id) {
           return $key;
       }
   }
   return false;
}
