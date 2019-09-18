<?php
  if(file_exists('env.php')) { //path to env file
      include 'env.php'; //path to env file
  }
  if(!function_exists('env')) {
      function env($key, $default = null)
      {
          $value = getenv($key);
          if ($value === false) {
              return $default;
          }
          return $value;
      }
  }
//   include "autoload.php";
//   env('VARIABLE_NAME');
?>