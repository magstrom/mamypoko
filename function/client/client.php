    <?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/client/clientURL.php');


function getClient($id, $username, $businessSector, $name, $phone, $email, $fax, $search)
{
    $url = getClientURL($id, $username, $businessSector, $name, $phone, $email, $fax, $search);
    //echo $url;
    $token = getToken();
    $customer = getAPI($url, $token);
    //print_r($customer);
    return json_decode($customer, true);
}
function updateClient($idClient, $username, $name, $email, $phone, $fax, $businessSector, $description, $logo)
{
    $url = putClientURL($idClient);
    $token = getToken();  
    $item = array (
        'idClient' => $idClient,
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'fax' => $fax,
        'businessSector' => $businessSector,
        'description' => $description,
        'logo' => $logo,
        'updatedBy' => getClientID()
        
    );
    //print_r($url);echo "<br>";echo "<br>";
    //print_r($item);echo "<br>";
    $client = putAPI($url, $token, $item);
    //print_r($client);exit();
    if($client == '"KO"'){
        return false;
    }
    else
    {
        return true;
    }
}


?>