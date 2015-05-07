<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getAccountDetailURL()
{
    $url = getAPIBaseDomain().'/api/account?skip=0&limit=10';
    return $url;
}
?>