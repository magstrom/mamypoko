<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/statistic/statisticURL.php');

function getStatisticFriend()
{
    $url = getStatisticFriendURL();
    //echo $url;exit();
    $token = getToken();
    $statistic = getAPI($url, $token);
    $statistic = json_decode($statistic, true);
    $code = $statistic['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($statistic);exit();
    return $statistic['statistics'];
}
function getStatisticProvince()
{
    $url = getStatisticProvinceURL();
    //echo $url;exit();
    $token = getToken();
    $statistic = getAPI($url, $token);
    $statistic = json_decode($statistic, true);
    $code = $statistic['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($statistic);exit();
    return $statistic['statistics'];
}
function getStatisticDiary()
{
    $url = getStatisticDiaryURL();
    //echo $url;exit();
    $token = getToken();
    $statistic = getAPI($url, $token);
    $statistic = json_decode($statistic, true);
    $code = $statistic['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($statistic);exit();
    return $statistic['statistics'];
}
function getStatisticMedia()
{
    $url = getStatisticMediaURL();
    //echo $url;exit();
    $token = getToken();
    $statistic = getAPI($url, $token);
    $statistic = json_decode($statistic, true);
    $code = $statistic['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($statistic);exit();
    return $statistic['statistics'];
}
?>