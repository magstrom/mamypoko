<?php

function getStickerGroupDetailURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker-group/'.$id;
    return $url;
}
function getStickerGroupURL()
{
    $url = getAPIBaseDomain().'/api/sticker-group';
    return $url;
}
function postStickerGroupURL()
{
    $url = getAPIBaseDomain().'/api/sticker-group';
    return $url;
}
function postStickerURL()
{
    $url = getAPIBaseDomain().'/api/sticker';
    return $url;
}
function putStickerGroupURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker-group/'.$id;
    return $url;
}
function deleteStickerGroupURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker-group/'.$id;
    return $url;
}
?>