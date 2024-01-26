<?php
  class Auth {
    /**
     *  Check login
     * */ 
    public static function isLoggedIn() : bool {
      return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
    }

    /**
     *  Require Login
     * */
    public static function requireLogin() {
      if (!static::isLoggedIn()) {
        die("Please login to continue!");
      }
    }

    /**
     *  Handle Login
     * */

    public static function login() {
      session_regenerate_id(true);
      $_SESSION['logged_in'] = true;
    }

    public static function logout() {
      if(ini_get("session.use_cookies")) {
        $param = session_get_cookie_params();
        setcookie(session_name(),
                  '', 
                  time()-42000, 
                  $param['path'], 
                  $param['domain'], 
                  $param['secure'], 
                  $param['httponly']);
      }
      session_destroy();
    }
  }
?>