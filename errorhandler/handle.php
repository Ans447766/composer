<?php
error_reporting(0);
set_error_handler("errorHandler");
register_shutdown_function("shutdownHandler");

function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
{
$error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
switch ($error_level) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_PARSE:
        mylog($error, "fatal");
        break;
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
        mylog($error, "error");
        break;
    case E_WARNING:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_USER_WARNING:
        mylog($error, "warn");
        break;
    case E_NOTICE:
    case E_USER_NOTICE:
        mylog($error, "info");
        break;
    case E_STRICT:
        mylog($error, "debug");
        break;
    default:
        mylog($error, "warn");
}
}

function shutdownHandler() //will be called when php script ends.
{
$lasterror = error_get_last();
switch ($lasterror['type'])
{
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_PARSE:
        $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
        mylog($error, "fatal");
}
}

function mylog($error, $errlvl)
{
    $date = date("F j, Y, g:i a");
    
    //error string
    $err = "$errlvl: $error";
    
    //putting error into log
    $myfiler = fopen("/opt/lampp/htdocs/MyWorks/ERPv1/errorhandler/errorslog.txt", "r") or die("please check read write permissions to the error logging file");
    $var = fread($myfiler,filesize("/opt/lampp/htdocs/MyWorks/ERPv1/errorhandler/errorslog.txt"));
    $myfilew = fopen("/opt/lampp/htdocs/MyWorks/ERPv1/errorhandler/errorslog.txt", "w") or die("please check read write permissions to the error logging file");
    $pattern = '/\n/';
    $replace = ' ';
    $err = preg_replace( $pattern, $replace, $err );
    $txt = "@$date = $err \n$var";
    fwrite($myfilew, $txt);
    fclose($myfilew);
    fclose($myfiler);
    // error_log("Error: [$errno] $errstr",1,
    // "someone@example.com","From: webmaster@example.com");
    header("location:../errorhandler/usererror.php?error=$err");
    die();
    //

}
?>  