<?php

function getStickerURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker-group/'.$id.'/stickers';
    return $url;
}
function getStickerDetailURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker/'.$id;
    return $url;
}
function putStickerURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker/'.$id;
    return $url;
}
function deleteStickerURL($id)
{
    $url = getAPIBaseDomain().'/api/sticker/'.$id;
    return $url;
}
?>