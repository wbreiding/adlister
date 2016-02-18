<?php
require_once 'Logger.php';
require_once '../models/User.php';

class Auth {

  public static function attempt($username,$password) {
    $logger = new Logger();

    $loggingUser = new User(NULL, $username);
    $verifyUser = $loggingUser->getUserByUsername($username);

    var_dump($verifyUser);
    if ($username == $verifyUser->attributes['username'] && password_verify($password, $verifyUser->attributes['password'])) {
      $_SESSION['logged_in_user'] = $username;
      $_SESSION['user_id'] = $verifyUser->attributes['id'];
      $logger->info("User $username logged in.");
      return true;
    } else {
      $logger->error("User $username failed to log in!");
      return false;
    }

  }

  public static function check() {
    return (isset($_SESSION['logged_in_user']) ? true : false);

  }

  public static function user() {
    return (isset($_SESSION['logged_in_user']) ? $_SESSION['logged_in_user'] : '');

  }

  public static function userId() {
    return (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '');
  }

  public static function logout() {
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);


  }
}

 ?>
