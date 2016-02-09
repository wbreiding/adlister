<?php
class User extends BaseModel {
  protected $table = 'user';
  define('DB_HOST', '127.0.0.1');
  define('DB_NAME', 'ad_list');
  define('DB_USER', 'ads_user');
  define('DB_PASS', 'adsUser');

  public $username;
  public $password;
  public $firstName;
  public $lastName;
  public $email;
  public $userArray = [
    'username'=>$username,
    'password'=>$password,
    'firstName'=>$firstName,
    'lastName'=>$lastName,
    'email'=>$email];

  function getUserByUsername($username) {
    find('username', $username);
  }

  function insertUser($userArray) {
    self::dbConnect();

    $insert = 'INSERT INTO user (username,password,firstName,lastName,email) VALUES (:username, :password, :firstName, :lastName, :email)';
    $stmt = $dbc->prepare($insert);

    $stmt->execute(array(':username'=>$user['username'], ':password'=>password_hash($user['password'],PASSWORD_BCRYPT), ':firstName'=>$user['firstName'], ':lastName'=>$user['lastName'], ':email'=>$user['email']));

  }
}
 ?>
