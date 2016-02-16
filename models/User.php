<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ad_list');
define('DB_USER', 'ads_user');
define('DB_PASS', 'adsUser');
require_once "BaseModel.php";
class User extends BaseModel {
  protected $table = 'user';

  public $id;
  public $username;
  public $password;
  public $firstName;
  public $lastName;
  public $email;
  public $userArray = [];

  function __construct($id=NULL, $username, $password, $firstName, $lastName, $email) {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->userArray = [
      'id'=>$id,
      'username'=>$username,
      'password'=>$password,
      'firstName'=>$firstName,
      'lastName'=>$lastName,
      'email'=>$email];
  }

  function getUserByUsername($username) {
    self::find('username', $username);
  }

  function insertUser() {
    self::dbConnect();

    $insert = 'INSERT INTO :table (username,password,firstName,lastName,email) VALUES (:username, :password, :firstName, :lastName, :email)';
    $stmt = $dbc->prepare($insert);
    $rows = $stmt->execute(array(':table'=>$this->table, ':username'=>$this->userArray['username'], ':password'=>password_hash($this->userArray['password'],PASSWORD_BCRYPT), ':firstName'=>$this->userArray['firstName'], ':lastName'=>$this->userArray['lastName'], ':email'=>$this->userArray['email']));

    if ($rows == 1) {
      //insert was successful
    } else {
      //something went wrong
    }
  }

  function updateUser() {
    self::dbConnect();

    $update = "UPDATE $table set username = ':user, password = ':password', firstName = ':firstName', lastName = ':lastName', email = ':email' where id = ':id'";
    $stmt = $dbc->prepare($update);
    $rows = $stmt->execute(array(':table'=>$this->table, ':username'=>$this->userArray['username'], ':password'=>password_hash($this->userArray['password'],PASSWORD_BCRYPT), ':firstName'=>$this->userArray['firstName'], ':lastName'=>$this->userArray['lastName'], ':email'=>$this->userArray['email'], ':id', $this->userArray['id']));

    if ($rows == 1) {
      //insert was successful
    } else {
      //something went wrong
    }

  }
}
 ?>
