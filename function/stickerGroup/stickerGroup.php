    <?php
// echo "masuk ke sticker.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/stickerGroup/stickerGroupURL.php');
//echo "masuk";exit();
function getStickerGroup()
{
    $url = getStickerGroupURL();
    //echo $url;exit();
    $token = getToken();
    $sticker = getAPI($url, $token);
    $sticker = json_decode($sticker, true);
    $code = $sticker['code'];
    if($code == 400)
    {
        return 'KO';
    }
    
    return $sticker['sticker_groups'];
}
function getStickerGroupDetail($id)
{
    $url = getStickerGroupDetailURL($id);
    //echo $url;
    $token = getToken();
    $sticker = getAPI($url, $token);
    $sticker = json_decode($sticker, true);
    $code = $sticker['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($sticker);
    return $sticker['sticker_group'];
}
function addStickerGroup($name, $filename, $filedata, $arrayNama, $arrayTemp, $jumlahArray)
{
    $url = postStickerGroupURL();
    $token = getToken();
    $image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";
    $item = array (
        'image' => $image,
        'name' => $name
    );
    $sticker = postFormAPI($url, $token, $item);
    $data = json_decode($sticker);
    $id = $data->sticker_group->id;
    $code = $data->code;
    //print_r($jumlahArray);exit();
    //print_r($sticker);exit();
        if($code == 200){
            for($i=0;$i < $jumlahArray; $i++){
                $urlSticker = postStickerURL();
                $imageSticker = curl_file_create($arrayTemp[$i],'image/png',$arrayNama[$i]);
                $itemSticker = array (
                                'image' => $imageSticker,
                                'name' => $arrayNama[$i],
                                'sticker_group_id' => $id
                              );
                $stickerPart = postFormAPI($urlSticker, $token, $itemSticker);
                $stickerData = json_decode($stickerPart);
                $codeSticker = $stickerData->code;
                if($code == 400){
                    return false;
                }
            }
            return true;
        }
        else
        {
            return false;
        }
}
function addSticker($name, $filename, $filedata, $id)
{
    $url = postStickerURL();
    $token = getToken();
    $image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";
    $item = array (
        'image' => $image,
        'name' => $name,
        'sticker_group_id' => $id
    );
    $sticker = postFormAPI($url, $token, $item);
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
function updateStickerGroup($name, $id)
{
    $url = putStickerGroupURL($id);
    //print_r($url);echo "<br>";exit();
    $token = getToken();
    //$image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";
    $item = array (
        'name' => $name
    );
    $postData = json_encode($item);
    //print_r($postData);exit();
    $sticker = putAPI($url, $token, $postData);
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
function removeStickerGroup($idStickerGroup)
{
    $url = deleteStickerGroupURL($idStickerGroup);

    $token = getToken();
    //print_r($item);echo "<br>";
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