<?php

function getLayoutListURL($id)
{
    $url = getAPIBaseDomain().'/api/layout?template_id='.$id;
    return $url;
}
function getLayoutDetailURL($id)
{
    $url = getAPIBaseDomain().'/api/layout/'.$id;
    return $url;
}
function postLayoutURL()
{
    $url = getAPIBaseDomain().'/api/layout';
    return $url;
}
function putLayoutURL($id)
{
    $url = getAPIBaseDomain().'/api/layout/'.$id;
    return $url;
}
function deleteLayoutURL($id)
{
    $url = getAPIBaseDomain().'/api/layout/'.$id;
    return $url;
}
?>