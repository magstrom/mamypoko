    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/news/newsURL.php');
//echo "masuk";exit();
function getNews()
{
    $url = getNewsURL();
    //print_r($url);echo "<br>";
    $token = getToken();
    $news = getAPI($url, $token);
    if($news == 'KO')
    {
        return 'KO';
    }
    return json_decode($news, true);
}
function getNewsDetail($id)
{
    $url = getNewsDetailURL($id);
    //print_r($url);echo "<br>";
    $token = getToken();
    $news = getAPI($url, $token);
    if($news == 'KO')
    {
        return 'KO';
    }
    return json_decode($news, true);
}

function addNews($item)
{
    $url = postNewsURL();
    $token = getToken();
    //print_r($item);exit();
    $news = postFormAPI($url, $token, $item);
    //print_r($news);echo "<br>";exit();
    $data = json_decode($news);
    $id = $data->news->id;
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
function updateNews($id,$item)
{
    $url = putNewsURL($id);
    $token = getToken();
    // print_r($url);echo "<br>";
    // print_r($item);exit();
    $news = putFormAPI($url, $token, $item);
    //print_r($news);echo "<br>";exit();
    $data = json_decode($news);
    $id = $data->news->id;
    $code = $data->code;
        if($code == 200){
            return true;
        }
        else
        {
            return false;
        }
}

function removeNews($id)
{
    $url = deleteNewsURL($id);
    //print_r($url);exit();
    $token = getToken();
    //print_r($id);echo "<br>";exit();
    $news = deleteAPI($url, $token);
    //print_r($news);echo "<br>";exit();
    $newsResult = json_decode($news);
    $code = $newsResult->code;
    print_r($news);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}

?>