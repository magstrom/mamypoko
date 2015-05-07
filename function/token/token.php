<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/token/tokenURL.php');

function getAuthToken($userId)
{
    $url = getTokenURL($userId);
    $token = getAPI($url, "token");
    $token = json_decode($token, true);
    if(empty($token))
    {
        return 'KO';
    }
    return $token;
}

function getUserFromToken($userId)
{
    $url = getUserFromTokenURL($userId);
    $token = getAPI($url, "token");
    $token = json_decode($token, true);
    if(empty($token))
    {
        return 'KO';
    }
    return $token;
}

function addAuthToken($userId, $ipAddress, $loginTime, $token, $userName, $displayName)
{
    $url = postTokenURL();
    //echo $url;
    $item = array (
        'userId' => $userId,
        'ipAddress' => $ipAddress,
        'loginTime' => $loginTime,
        'token' => $token,
        'userName' => $userName,        
        'displayName' => $displayName
    );
    //print_r($item);echo "<br>";
    $token = postAPI($url, $token, $item);
    $token = json_decode($token, true);
    //print_r($token);
    if($token["Message"] == "Error"){
        return false;
    }
    else{
        return true;
    }
}
function updateUserFromToken($userId, $idRBS)
{
    $url = putUserFromTokenURL($userId);
    $token = getToken();
    $item = array (
        'userId' => $userId,
        'idRBS' => $idRBS
    );
    $user = putAPI($url, $token, $item);
    if($user == '"KO"'){
        return false;
    }
    else{
        return true;
    }
}