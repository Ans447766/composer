<?php
  //fetch password locked directory name from database 

  //and add it to $variables array below
  $variables = [
    'nullornot' => false,
      'DIR_GRD' => 'iuhiuhIHIUHih98',
      'APP_KEY' => 'ok8779*(&&*iuiuiu',
      'DB_HOST' => 'localhost',
      'DB_USER' => 'root',
      'DB_PASS' => '',
      'DB_NAME' => 'demoDB',
      'DB_PORT' => '3306',
  ];
  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
  //   include "autoload.php";
  //   env('VARIABLE_NAME');
?>