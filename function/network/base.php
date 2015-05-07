<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getAPI($url, $token)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: '.$token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) 
    {
        return "KO";
    }
    return $response;
}
function putAPI($url, $token, $postData)
{
    $curlUpdate = curl_init($url);
    //curl_setopt($curlUpdate, CURLOPT_HTTPHEADER, array('Api-Key: '.$token));
    curl_setopt($curlUpdate, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlUpdate, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curlUpdate, CURLOPT_POSTFIELDS,$postData);
    curl_setopt($curlUpdate, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',
    'Api-Key: '.$token,                                                                                
    'Content-Length: ' . strlen($postData))                                                                       
    );   
    $response = curl_exec($curlUpdate);
    // print_r($curlUpdate);echo "<br>";
    //print_r($response);echo "<br>";exit();
    curl_close($curlUpdate);
    if(!$response) 
    {
        return "KO";
    }
    return $response;
}

function postAPI($url, $token, $postData){
  $ch = curl_init($url);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: '.$token)); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
  curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',
    'Api-Key: '.$token,                                                                                
    'Content-Length: ' . strlen($postData))                                                                       
    );   
  $response = curl_exec($ch);
    // print_r($ch);echo "<br>";
    // print_r($response);echo "<br>";exit();
  curl_close($ch); 
  if(!$response) 
  {
    return "KO";
  }
  return $response;
}

function deleteAPI($url, $token){ //michael & piput yg bikin
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: '.$token)); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
  //curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($deleteData));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $response = curl_exec($ch);
  //print_r($response);exit();
  curl_close($ch); 
  return $response;
}

function postAPILoginHeader($url, $postData) {
    //print_r($postData);echo "<br>";
    $ch = curl_init($url);                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($postData))                                                                       
    );                                                                                                                   
     
    $result = curl_exec($ch);
    // print_r($ch);echo "<br>";
    // print_r($result);echo "<br>";
    curl_close($ch);
    if(!$result) 
    {
        return "KO";
    }
    return $result;
}
  
function postFormAPI($url, $token, $item){
    print_r($item);echo "<br>";
    //$fp = fopen($filedata, 'r');
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $item);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type:multipart/form-data',
        //'Content-Type: application/json',  
        'Api-Key: '.$token)                                                                       
    );
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $item); 
    $result = curl_exec($ch);
    //print_r($result);exit();
    //print_r(json_decode($result)); exit();
    curl_close($ch);
    if(!$result) 
    {
        return "KO";
    }
    //exit();
    //echo "output:";print_r($result); exit();
    return $result;
}
function putFormAPI($url, $token, $item)
{
    $ch = curl_init($url);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: '.$token));
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
    curl_setopt($ch, CURLOPT_POSTFIELDS,$item);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',
    'Api-Key: '.$token
    )); 
    $response = curl_exec($ch);
    //print_r($response);exit();
    curl_close($ch);
    if(!$response) 
    {
        return "KO";
    }
    return $response;
}

function getAPIWOHeader($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) 
    {
        return "KO";
    }
    return $response;
}
function postAPIWOHeader($url, $postData) {
    //print_r($postData);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));
    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) 
    {
        return "KO";
    }
    return $response;
}
function redirectTO($url)
{
    header('Location: '.$url);
}
function displayError()
{
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
}
