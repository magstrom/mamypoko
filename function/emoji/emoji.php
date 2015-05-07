    <?php
// echo "masuk ke sticker.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/emoji/emojiURL.php');
//echo "masuk";exit();
function getEmoji()
{
    $url = getEmojiURL();
    //echo $url;exit();
    $token = getToken();
    $emoji = getAPI($url, $token);
    $emoji = json_decode($emoji, true);
    $code = $emoji['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($emoji);echo "<br>";
    return $emoji['sticker'];
}
function getEmojiDetail($id)
{
    $url = getEmojiDetailURL($id);
    //echo $url;
    $token = getToken();
    $emoji = getAPI($url, $token);
    $emoji = json_decode($emoji, true);
    $code = $emoji['code'];
    if($code == 400)
    {
        return 'KO';
    }
    //print_r($emoji);
    return $emoji['sticker'];
}
function addEmoji($name, $filename, $filedata)
{
    $url = postEmojiURL();
    $token = getToken();
    $image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";
    $item = array (
        'id' => $name,
        'image' => $image
    );
    $emoji = postFormAPI($url, $token, $item);
    print_r($emoji);echo "<br>";
    $data = json_decode($emoji);
    $id = $data->emoji->id;
    $code = $data->code;
    //print_r($jumlahArray);exit();
    //print_r($emoji);exit();
        if($code == 200){
            return true;
        }
        else
        {
            return false;
        }
}

function updateEmoji($id,$filename,$filedata)
{
    $url = putEmojiURL($id);
    //print_r($url);echo "<br>";
    $token = getToken();
    $image = curl_file_create($filedata,'image/png',$filename);
    //print_r($image);echo "<br>";
    $item = array (
        'image' => $image
    );
    //$postData = json_encode($item);
    $emoji = putFormAPI($url, $token, $item);
    $data = json_decode($emoji);
    //print_r($data);exit();
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
function removeEmoji($id)
{
    $url = deleteEmojiURL($id);

    $token = getToken();
    //print_r($item);echo "<br>";
    $emoji = deleteAPI($url, $token);
    $emojiResult = json_decode($emoji);
    $code = $emojiResult->code;
    //print_r($sticker);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}
?>