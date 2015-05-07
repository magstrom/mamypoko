<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getImbursementURL($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search)
{
    return getAPIBaseDomain().'/api/Imbursement?idImbursement='.$id.'&createdByNew='.$createdByNew.'&name='.$name.'&month='.$month.'&year='.$year.'&idType='.$idType.'&idStatus='.$idStatus.'&approvedByNew='.$approvedByNew.'&RBS='.$RBS.'&search='.$search;
}
function getImbursementPagingURL($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search, $pageIndex, $pageSize)
{
    return getAPIBaseDomain().'/api/Imbursement/Paging?idImbursement='.$id.'&createdByNew='.$createdByNew.'&name='.$name.'&month='.$month.'&year='.$year.'&idType='.$idType.'&idStatus='.$idStatus.'&approvedByNew='.$approvedByNew.'&RBS='.$RBS.'&search='.$search.'&pageIndex='.$pageIndex.'&pageSize='.$pageSize;
}
function getTotalImbursementURL($createdByNew, $month, $year)
{
	return getAPIBaseDomain().'/api/Imbursement/TotalImbursement?createdByNew='.$createdByNew.'&month='.$month.'&year'.$year;
}
function postImbursementURL()
{
    $url = getAPIBaseDomain().'/api/Imbursement';
    return $url;
}
function putImbursementURL($id)
{
    $url = getAPIBaseDomain().'/api/Imbursement/'.$id;
    return $url;
}
function removeImbursementURL($id)
{
    $url = getAPIBaseDomain().'/api/Imbursement?idRemove='.$id;
    return $url;
}
