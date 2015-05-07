<?php

function getBadgesURL()
{
        return getAPIBaseDomain().'/api/badges';
}
function getBadgesDetailURL($id)
{
        return getAPIBaseDomain().'/api/badges/'.$id;
}
function postBadgesURL()
{
	return getAPIBaseDomain().'/api/badges';
}

function putBadgesURL($id)
{
    return getAPIBaseDomain().'/api/badges/'.$id;
}

function removeBadgesURL($idBadges)
{
    return getAPIBaseDomain().'/api/badges/'.$idBadges;
}


