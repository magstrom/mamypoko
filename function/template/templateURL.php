<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getTemplateURL()
{
    $url = getAPIBaseDomain().'/api/template';
    return $url;
}
function getTemplateDetailURL($idTemplate)
{
    $url = getAPIBaseDomain().'/api/template/'.$idTemplate;
    return $url;
}
function postTemplateURL()
{
    $url = getAPIBaseDomain().'/api/template';
    return $url;
}
function putTemplateURL($id)
{
    $url = getAPIBaseDomain().'/api/template/'.$id;
    return $url;
}
function deleteTemplateURL($id)
{
    $url = getAPIBaseDomain().'/api/template/'.$id;
    return $url;
}
?>