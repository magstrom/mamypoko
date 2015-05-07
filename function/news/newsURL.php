<?php

function getNewsURL()
{
   return getAPIBaseDomain().'/api/news';
}

function getNewsDetailURL($id)
{
   return getAPIBaseDomain().'/api/news/'.$id;
}
function postNewsURL()
{
   return getAPIBaseDomain().'/api/news';
}
function putNewsURL($id)
{
    return getAPIBaseDomain().'/api/news/'.$id;
}
function deleteNewsURL($id)
{
    return getAPIBaseDomain().'/api/news/'.$id;
}


