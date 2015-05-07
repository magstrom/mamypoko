    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/layout/layoutURL.php');
//echo "masuk";exit();
function getLayoutList($id)
{
    $url = getLayoutListURL($id);
    //echo $url;exit();
    $token = getToken();
    $layout = getAPI($url, $token);
    $layout = json_decode($layout, true);
    if($layout == 'KO')
    {
        return 'KO';
    }
    return $layout ['layouts'];
}
function getLayoutDetail($id)
{
    $url = getLayoutDetailURL($id);
    //echo $url;exit();
    $token = getToken();
    $layout = getAPI($url, $token);
    $layout = json_decode($layout, true);

    if($layout == 'KO')
    {
        return 'KO';
    }
    //print_r($layout);echo "<br>";
    return $layout ['layout'];
}

function addLayout($title, $id,$filedata, $filename,$itemUpdate)
{
    $url = postLayoutURL();
    //$jumlahArray = count($arrayX);
    //echo "jumlah Array ".$jumlahArray;echo "<br>";
    $token = getToken();
    $layout = curl_file_create($filedata,'image/png',$filename);
    $item = array (
        'layout' => $layout,
        'name' => $title,
        'template_id' => $id
    );
    //print_r($item);exit();
    $layout = postFormAPI($url, $token, $item);
    $data = json_decode($layout);
    $id = $data->layout->id;
    $code = $data->code;
        if($code == 200){
            $urlUpdate = putLayoutURL($id);
            $itemLayout = json_encode($itemUpdate,true);
            //print_r($itemLayout);echo "<br>";
            $update = putAPI($urlUpdate, $token, $itemLayout);
            $data = json_decode($update);
            $code = $data->code;
            //print_r($data);exit();
                if($code == 200){
                    return true;
                }
                else
                {
                    return false;
                }
            return true;
        }
        else
        {
            return false;
        }
}
function updateLayout($id, $itemUpdate,$template)
{
    $url = putLayoutURL($id);
    $token = getToken();
    //$image = curl_file_create($filedata,'image/png',$filename);
    //print_r($arrayNama);echo "<br>";
    $item = $itemUpdate;
    $postData = json_encode($item);
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
function removeLayout($id)
{
    $url = deleteLayoutURL($id);

    $token = getToken();
    //print_r($id);echo "<br>";exit();
    $layout = deleteAPI($url, $token);
    $layoutResult = json_decode($layout);
    $code = $layoutResult->code;
    //print_r($layout);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}
?>