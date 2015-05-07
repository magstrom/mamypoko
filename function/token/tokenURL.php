<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getTokenURL($userId)
{
    return getAPIBaseDomain().'/api/Token?userId='.$userId;
}
function getUserFromTokenURL($userId)
{
    return getAPIBaseDomain().'/api/Token/User?userId='.$userId;
}
function postTokenURL()
{
    return getAPIBaseDomain().'/api/Token';
}
function putUserFromTokenURL($id)
{
    return getAPIBaseDomain().'/api/Token?id='.$id;
}

?>