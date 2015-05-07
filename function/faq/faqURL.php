<?php

function getFaqURL()
{
   return getAPIBaseDomain().'/api/faq';
}

function getFaqDetailURL($id)
{
   return getAPIBaseDomain().'/api/faq/'.$id;
}
function postFaqURL()
{
   return getAPIBaseDomain().'/api/faq';
}
function putFaqURL($id)
{
    return getAPIBaseDomain().'/api/faq/'.$id;
}

function deleteFaqURL($id)
{
    return getAPIBaseDomain().'/api/faq/'.$id;
}



