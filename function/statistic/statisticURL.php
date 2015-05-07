<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getStatisticFriendURL()
{
    $url = getAPIBaseDomain().'/api/statistics/friend';
    return $url;
}
function getStatisticProvinceURL()
{
    $url = getAPIBaseDomain().'/api/statistics/provinceuser';
    return $url;
}
function getStatisticDiaryURL()
{
    $url = getAPIBaseDomain().'/api/statistics/diary';
    return $url;
}
function getStatisticMediaURL()
{
    $url = getAPIBaseDomain().'/api/statistics/media';
    return $url;
}
?>