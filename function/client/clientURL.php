<?php
//echo "masuk";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getClientURL($id, $username, $businessSector, $name, $phone, $email, $fax, $search)
{
    $url = getAPIBaseDomain().'/api/Client/'.$id.'?username='.$username.'&businessSector='.$businessSector.'&name='.$name.'&phone='.$phone.'&email='.$email.'&fax='.$fax.'&search='.$search;
    return $url;
}
function putClientURL($id)
{
    $url = getAPIBaseDomain().'/api/Client/'.$id;
    return $url;
}
?>