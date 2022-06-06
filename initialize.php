<?php

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  // define("PAGES_PATH", PROJECT_PATH . '/pages');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  // $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $public_end);

  require_once('functions.php');

?>
