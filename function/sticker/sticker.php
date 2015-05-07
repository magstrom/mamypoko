    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/sticker/stickerURL.php');
//echo "masuk";exit();
function getSticker($id)
{
    $url = getStickerURL($id);
    //echo $url;exit();
    $token = getToken();
    $sticker = getAPI($url, $token);
    $sticker = json_decode($sticker, true);
    $code = $sticker['code'];
    if($code == 400)
    {
        return 'KO';
    }
    return $sticker['sticker'];
}
function getStickerDetail($id)
{
    $url = getStickerDetailURL($id);
    //echo $url;exit();
    $token = getToken();
    $sticker = getAPI($url, $token);
    $sticker = json_decode($sticker, true);
    //print_r($sticker);exit();
    $code = $sticker['code'];
    if($code == 400)
    {
        return 'KO';
    }
    return $sticker['sticker'];
}
function updateSticker($idSticker, $item)
{
    $url = putStickerURL($idSticker);
    $token = getToken();
    //$image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";

    //$postData = json_encode($item);
    //print_r($postData);exit();
    $sticker = putFormAPI($url, $token, $item);
    $data = json_decode($sticker);
    $code = $data->code;
    //print_r($data);exit();
        if($code == 200){
            return true;
        }
        else
        {
            return false;
        }
}
function removeSticker($id)
{
    $url = deleteStickerURL($id);
    $token = getToken();
    //print_r($url);echo "<br>";exit();
    $sticker = deleteAPI($url, $token);
    $stickerResult = json_decode($sticker);
    $code = $stickerResult->code;
    //print_r($sticker);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}

?>