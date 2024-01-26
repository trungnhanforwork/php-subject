<?php
  /**
   * Use for autoload 
   */

  

  spl_autoload_register(
    function($className) {
      $fileName = strtolower($className) . ".php"; 
      $dirRoot = dirname(__DIR__);
      require $dirRoot . "/classes/" . $fileName;
    }
  );

  require dirname(__DIR__) . "/config.php";
  if (session_id() === ' ') {
    session_start();
  }
?>