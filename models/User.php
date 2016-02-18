<?php
require_once "BaseModel.php";

class User extends BaseModel {
  protected static $table = 'user';

  public $id;
  public $username;
  public $password;
  public $firstName;
  public $lastName;
  public $email;

  function __construct($id=NULL, $username=NULL, $password=NULL, $firstName=NULL, $lastName=NULL, $email=NULL) {
    if ($id == NULL) {
      $this->username = $username;
      $this->password = $password;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
    }  elseif ($username == NULL) {
      $newUser = self::getUserByID($id);
      if ($newUser == NULL) {
        return;
      }
      $this->id = $id;
      $this->username = $newUser->attributes['username'];
      $this->firstName = $newUser->attributes['firstName'];
      $this->lastName = $newUser->attributes['lastName'];
      $this->email = $newUser->attributes['email'];

    } else {
      $this->id = $id;
      $this->username = $username;
      $this->password = $password;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
    }


  }

  function getUserByUsername($username) {
    return self::find('username', $username);
  }

  function getUserByID($id) {
    return self::find('id', $id);
  }

  public static function getAllUsers() {
    return static::all();
  }

  function insert() {

    $tbl = self::$table;

    $insert = "INSERT INTO $tbl (username,password,firstName,lastName,email) VALUES (:username, :password, :firstName, :lastName, :email)";
    $insertArray = array(':username'=>$this->username, ':password'=>password_hash($this->password,PASSWORD_BCRYPT), ':firstName'=>$this->firstName, ':lastName'=>$this->lastName, ':email'=>$this->email);

    return static::save('insert', $insert, $insertArray);
  }

  function update() {
    $tbl = self::$table;

    $update = "UPDATE $tbl set username = :user, password = :password, firstName = :firstName, lastName = :lastName, email = :email where id = :id";
    $updateArray = array(':user'=>$this->username, ':password'=>password_hash($this->password,PASSWORD_BCRYPT), ':firstName'=>$this->firstName, ':lastName'=>$this->lastName, ':email'=>$this->email, ':id'=>$this->id);

    return static::save('update', $update, $updateArray);

  }
}
 ?>
