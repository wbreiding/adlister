<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";

require_once '../utils/Input.php';
require_once '../utils/Auth.php';
?>

<?php


function pageController() {
  $data = array();

  session_start();
  if (Auth::check()) {
    header("Location: index.php");
  }

  $username = (Input::has('username') ? Input::getString('username') : '');
  $password = (Input::has('password') ? Input::getString('password') : '');
  $errorMessage = "";

  if ($username == '' && $password == '') {

  } elseif (Auth::attempt($username,$password)) {
    header("Location: index.php");
    EXIT;
  } else {
    $errorMessage = "Login Failed. Please try again.";
  }

  $data['errorMessage'] = $errorMessage;

  return $data;
}

extract(pageController());
 ?>

 <div id="message"><?= $errorMessage ?></div>

<form method="post" action="">

  <label for="username">Username</label> <input type="text" name="username" /><br />
  <label for="password">Password</label> <input type="text" name="password" /><br />

  <input type="submit" name="submit" value="Login" />

</form>

<?php
include "../views/partials/footer.php";
?>
