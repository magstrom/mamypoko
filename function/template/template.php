    <?php
// echo "masuk ke inventory.php";echo "<br>";exit();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(getFunctionPath().'/network/base.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/template/templateURL.php');
//echo "masuk";exit();
function getTemplate()
{
    $url = getTemplateURL();
    //echo $url;exit();
    $token = getToken();
    $template = getAPI($url, $token);
    $template = json_decode($template, true);
    if($template == 'KO')
    {
        return 'KO';
    }
    return $template ['templates'];
}
function getTemplateDetail($idTemplate)
{
    $url = getTemplateDetailURL($idTemplate);
    //echo $url;exit();
    $token = getToken();
    $template = getAPI($url, $token);
    $template = json_decode($template, true);

    if($template == 'KO')
    {
        return 'KO';
    }
    //print_r($template);
    return $template ['template'];
}
function addTemplate($name, $description)
{
    $url = postTemplateURL();
    $token = getToken();
    $item = array (
        'name' => $name,
        'description' => $description
    );
    $item = json_encode($item);
    $template = postAPI($url, $token, $item);
    //print_r($template);exit();
        if($template == '"KO"'){
            return false;
        }
        else
        {
            return true;
        }
}
function updateTemplate($id, $name, $description)
{
    $url = putTemplateURL($id);
    $token = getToken();
    $item = array (
        'name' => $name,
        'description' => $description
    );
    $item = json_encode($item);
    //print_r($item);exit();
    $template = putAPI($url, $token, $item);
    $template = json_decode($template, true);
    $code = $template['code'];
    //print_r($template['code']);exit();
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
function removeTemplate($id)
{
    $url = deleteTemplateURL($id);

    $token = getToken();
    //print_r($id);echo "<br>";exit();
    $template = deleteAPI($url, $token);
    $templateResult = json_decode($template);
    $code = $templateResult->code;
    //print_r($template);exit();
    if($code == 200)
    {
        return true;
    }
    return false;
}
?>