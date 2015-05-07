<?php

function getNotificationURL($id)
{
    $url = getAPIBaseDomain().'/notification?id='.$id;
    return $url;
}
?>