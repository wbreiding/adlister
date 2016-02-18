<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";

require_once "../models/User.php";
require_once "../utils/Input.php";
require_once "../utils/Auth.php";
?>

<?php

session_start();
if (Auth::check()) {
  $user_id = Auth::userId();
} else {
  header("Location: auth.login.php");
}
$user = new User($user_id);

 ?>
<p>
  Username: <?=$user->username?><br />

  Name: <?=$user->firstName?> <?=$user->lastName?> <br />
  Email Address: <?=$user->email?><br />


<?php
include "../views/partials/footer.php";
?>
