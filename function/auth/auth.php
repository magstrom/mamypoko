<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
require_once(getFunctionPath().'/common/validator.php');
require_once(getFunctionPath().'/common/cookie.php');
require_once(getFunctionPath().'/network/base.php');



function login($email, $password)
{

    $url = '/api/account/login';
    $url = getAPIBaseDomain().$url;
    $tokenData = array (
        'id' => $email,
        'password' => $password
    );
    $tokenData = json_encode($tokenData); 
    // echo $url;echo "<br>";
    //print_r($tokenData);echo "<br>";exit();
    //$getTokenResult = postAPILoginHeader($url, $tokenData);
    //print_r($getTokenResult);exit();
    try 
    {
        $getTokenResult = postAPILoginHeader($url, $tokenData);
        //print_r($getTokenResult);exit();
        $jsonToken = json_decode($getTokenResult, true);
        $code = $jsonToken["code"];
        //print_r($jsonToken);exit();
        if($code == 200){
            $token = $jsonToken["api_key"];

            $client = getClientLogged($token);
            //print_r($client);echo "<br>";exit();
            $name = $client['account']["name"];
            $email = $client['account']["email"];
            beginSession($token, $name, $email);
            header("Location: /view/dashboard.php");exit(); // sukses login
        }elseif($code == 400 || $code == 401){
            header("Location: /?login=error");exit(); // gagal login
        }

        
        

    }
    catch (Exception $e) 
    {

         header("Location: /?login=error");exit();
    }

     //header("Location: /?login=error");exit();
}

function getManagerLogged($token)
{
    $url = '/api/AccountManager/Me';
    $url = getAPIBaseDomain().$url;
    $result = getAPI($url, $token);
    if($result == '"KO"')
    {
        return 'KO';
    }
    return json_decode($result, true);
}

function getClientLogged($token)
{
    $url = '/api/account/detail';
    $url = getAPIBaseDomain().$url;
    $result = getAPI($url, $token);
    if($result == '"KO"')
    {
        return 'KO';
    }
    return json_decode($result, true);
}

function beginSession($token, $name, $email)
{
    // print_r($token);echo "<br>";
    // print_r($name);echo "<br>";
    // print_r($email);echo "<br>";
    // exit();
    $_SESSION['token'] = $token;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    setCookieValue('token', $token, 3600);
    setCookieValue('name', $name, 3600);
    setCookieValue('email', $email, 3600);
}
