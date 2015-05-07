    <?php
// echo "masuk ke Badges.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/badges/badgesURL.php');
//echo "masuk";exit();
function getBadges()
{
    $url = getBadgesURL();
    //echo $url;exit();
    $token = getToken();
    $Badges = getAPI($url, $token);
    if($Badges == 'KO')
    {
        return 'KO';
    }
    return json_decode($Badges, true);
}
function getBadgesDetail($id)
{
    $url = getBadgesDetailURL($id);
    //echo $url;exit();
    $token = getToken();
    $Badges = getAPI($url, $token);
    if($Badges == 'KO')
    {
        return 'KO';
    }
    return json_decode($Badges, true);
}

function addBadges($filename, $filedata, $title,$description,$category,$number)
{
    $url = postBadgesURL();
    //print_r($url);echo "<br>";
    $image = curl_file_create($filedata,'image/png',$filename);
    $token = getToken();
    //print_r($token);echo "<br>";
    $item = array (
        'name' => $title,
        'description' => $description,
        'image' => $image,
        'category' => $category,
        'target' => $number
    );
    //print_r($item);echo "<br>";
    //$item = json_encode($item);
    $Badges = postFormAPI($url, $token, $item);
    $Badges = json_decode($Badges);
    $code = $Badges->code;
    //print_r($Badges);echo "<br>";exit();
        if($code == 200){
            return true;
        }
        else
        {
            return false;
        }
}


function updateBadges($id,$item)
{
    $url = putBadgesURL($id);
    $token = getToken();
   //  print_r($url);echo "<br>";
   //  print_r($item);echo "<br>";
  //   print_r($token);echo "<br>";
    $badges = putFormAPI($url, $token, $item);
    //print_r($badges);echo "<br>";exit();
    $data = json_decode($badges);
   // printf($data);exit();
    $id = $data->badges->id;
    $code = $data->code;
        if($code == 200){
            return true;
        }
        else
        {
            return false;
        }
}

function removeBadges($id)
{
    $url = removeBadgesURL($id);

    $token = getToken();
    //print_r($id);echo "<br>";exit();
    $Badges = deleteAPI($url, $token);
    $badgeResult = json_decode($Badges);
    $code = $badgeResult->code;
    //print_r($temfaqplate);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}


?>