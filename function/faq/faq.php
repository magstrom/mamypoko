    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/faq/faqURL.php');
//echo "masuk";exit();
function getFaq()
{
    $url = getFaqURL();
    $token = getToken();
    $faq = getAPI($url, $token);
    if($faq == 'KO')
    {
        return 'KO';
    }
    return json_decode($faq, true);
}
function getInventoryPaging($idInventory, $idUser, $status, $search, $page)
{
    $url = getInventoryPagingURL($idInventory, $idUser, $status, $search, $page);
    //echo $url;exit();
    $token = getToken();
    $inventory = getAPI($url, $token);
    if($inventory == 'KO')
    {
        return 'KO';
    }
    return json_decode($inventory, true);
}

function getFaqDetail($id)
{
    $url = getFaqDetailURL($id);
    //echo $url;exit();
    $token = getToken();
    $faq = getAPI($url, $token);
    $faq = json_decode($faq, true);

    if($faq == 'KO')
    {
        return 'KO';
    }
    //print_r($template);
    return $faq ['faq'];
}

function addFaq($title, $content)
{
    $url = postFaqURL();
    $token = getToken();
    $item = array (
        'title' => $title,
        'content' => $content
    );
    $item = json_encode($item);
    //print_r($item);echo "<br>";
    $faq = postAPI($url, $token, $item);
    //print_r($faq);echo "<br>";exit();
    $data = json_decode($faq);
    $code = $data->code;
    if($faq == 200 ){
        return false;
    }
    else
    {
        return true;
    }
}

function updateFaq($id, $title, $content)
{
    $url = putFaqURL($id);
    $token = getToken();
    $item = array (
        'title' => $title,
       'content' => $content
    );
    $item = json_encode($item);
    //print_r($item);exit();
    $faq = putAPI($url, $token, $item);
    $faq = json_decode($faq, true);
    $code = $faq['code'];
   // print_r($faq['code']);exit();
    if($code == 400)
    {
        return 'KO';
    }
    else
    {
        return $code;
    }
    //return json_decode($template, true);
}

function removeFaq($id)
{
    $url = deleteFaqURL($id);

    $token = getToken();
    //print_r($id);echo "<br>";exit();
    $faq = deleteAPI($url, $token);
    $faqResult = json_decode($faq);
    $code = $faqResult->code;
    //print_r($temfaqplate);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}


?>