<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/imbursement/imbursementURL.php');
require_once(getFunctionPath().'/token/token.php');
require_once(getFunctionPath().'/common/email.php');

function getImbursement($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search)
{
    $url = getImbursementURL($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search);
    $token = 'token';
    //echo $url;
    $Imbursement = getAPI($url, $token);
    $Imbursement = json_decode($Imbursement, true);
    if(empty($Imbursement))
    {
        return 'KO';
    }
    return $Imbursement;
}
function getImbursementPaging($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search, $pageIndex, $pageSize)
{
    $url = getImbursementPagingURL($id, $createdByNew, $name, $month, $year, $idType, $idStatus, $approvedByNew, $RBS, $search, $pageIndex, $pageSize);
    $token = 'token';
    //echo $url;
    $Imbursement = getAPI($url, $token);
    $Imbursement = json_decode($Imbursement, true);
    if(empty($Imbursement))
    {
        return 'KO';
    }
    return $Imbursement;
}
function addImbursement($idUser, $name, $description, $idType, $cost, $image1, $imburseDate)
{
    $url = postImbursementURL();
    $user = getAuthToken($idUser);
    $namaUser = $user[0]['displayName'];
    $emailUser = $user[0]['userName'];

    $token = getToken();
    $item = array (
        'name' => $name,
        'description' => $description,
        'idType' => $idType,
        'cost' => $cost,
        'createdByNew' => $idUser,
        'image1' => $image1,
        'imburseDate' => $imburseDate
        
    );
    //print_r($item);echo "<br>";
    $Imbursement = postAPI($url, $token, $item);
    $result = json_decode($Imbursement,true);
    //print_r($Imbursement);exit();
    if($result["Message"] == 'Error'){
        return false;
    }
    else{
        if ($result != '"KO"')
        {
            
            $to = 'michael@zenith.co.id';
            $subject = "Pengajuan Reimbursement Baru";
            $html = file_get_contents('http://expenses.zenith.co.id/function/imbursement/email.html');
            //str_replace(search, replace, subject)
            $html = str_replace('@user',$namaUser, $html);
            $html = str_replace('@email',$emailUser, $html);
            $html = str_replace('@date', $imburseDate, $html);
            $html = str_replace('@name', $name, $html);
            $html = str_replace('@description', $description,  $html);
            $html = str_replace('@cost', $cost, $html);
            $html = str_replace('@image',$image1, $html);
            $message = $html;
            if(sendEmail($to, $subject, $message) == 'OK')
            {
                //echo "Email Sukses Dikirim";
            }
            else 
            {
                //echo "Email gagal Dikirim";
            }
        }
        //exit();
        return true;
    }
}
function updateImbursement($idImbursement, $name, $description, $idType, $cost, $idStatus, $approvedByNew, $image1, $imburseDate, $notes)
{
    // print_r($sendEmail);exit();
    $url = putImbursementURL($idImbursement);
    $token = getToken();  
    $item = array (
        'idImbursement' => $idImbursement,
        'name' => $name,
        'description' => $description,
        'idType' => $idType,
        'cost' => $cost,
        'idStatus' => $idStatus,
        'approvedByNew' => $approvedByNew,
        'updatedByNew' => GetUserID(),
        'image1' => $image1,
        'imburseDate' => $imburseDate,
        'notes' => $notes
        
    );
    //print_r($item);echo "<br>";exit();
    $Imbursement = putAPI($url, $token, $item);
    //print_r($Imbursement);exit();
    if($Imbursement == '"KO"'){
        return false;
    }
    else
    {  
       
        return true;
    }
}

function removeImbursement($id, $isActive)
{
    $url = removeImbursementURL($id);
    echo $url;echo "<br>";
    $token = getToken();  
    $item = array (
        'idImbursement' => $id,
        'isActive' => $isActive,
        'updatedByNew' => GetUserID()
    );
    //print_r($item);echo "<br>";
    $Imbursement = putAPI($url, $token, $item);
    //print_r($Imbursement);exit();
    if($Imbursement == '"KO"'){
        return false;
    }
    else
    {
        return true;
    }
}
?>