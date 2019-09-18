<?php
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
    //--------------------------------------------------------//
    //  please remove this for when implement site to server  //
    //  this code block is temporary                          //
    //  $requestx = substr($requestx,15);                     //
    //--------------------------------------------------------//
    $realip = getRealIpAddr();
    $url = $_SERVER['REQUEST_URI'];
    //string filteration function
    function filter($string){
      $string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
      $string = filter_var($string, FILTER_SANITIZE_URL);
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      return $string;
    }
    //1: trim url remove xqueries etc
    $url = filter($url);
    if(strpos($url,"?")){
      $a = preg_split( "/(\?|\.|!)/", $url );
      $url = $a[0];
    }
    //temporary
    $url = substr($url, 14);
    //-->
    $explode = explode('/',$url);
    $mth = $_SERVER['REQUEST_METHOD'];
    $ip = $realip;
?>