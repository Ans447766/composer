<?php
//prerequisites .
require 'errorhandler/handle.php';
require "autoload.php";
require 'router.php';
require 'page.php';
if(env('nullornot') == true){  
    die('(maybe construction works or other processes going on please try again later) OR (TRY TO REFREASH THE PAGE)');
}else{
    if (file_exists(env('DIR_GRD') . "/test.txt")) //gaurd check
    {
        echo "<script>console.log('url : ".$url."');console.log('method : ".$mth."')</script>";
        if (preg_match('/ajax/',$explode[1])){
            
        }else{
            view($url,$mth);
        }
    }else{
        require "gaurd.html";
        trigger_error("ERROR due to directory gaurd updating");
    }
}    
?>