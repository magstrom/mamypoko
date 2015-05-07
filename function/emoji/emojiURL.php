<?php

function getEmojiDetailURL($id)
{
    $url = getAPIBaseDomain().'/api/emoji/'.$id;
    return $url;
}
function getEmojiURL()
{
    $url = getAPIBaseDomain().'/api/emoji';
    return $url;
}
function postEmojiURL()
{
    $url = getAPIBaseDomain().'/api/emoji';
    return $url;
}
function putEmojiURL($id)
{
    $url = getAPIBaseDomain().'/api/emoji/'.$id;
    return $url;
}
function deleteEmojiURL($id)
{
    $url = getAPIBaseDomain().'/api/emoji/'.$id;
    return $url;
}
?>