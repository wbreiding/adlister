<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";

require_once "../models/User.php";
require_once "../utils/Input.php";
?>

<?php
$message = "";
if (Input::get('submit') == "Submit") {
  $user = new User(Input::get('id'), Input::get('username'), Input::get('password'), Input::get('firstname'), Input::get('lastname'), Input::get('email'));
  $user->update();
  $message = "You have successfully updated your ad.";
  $id = $user->id;

} else {
  $id = Input::get('id');
  $id = 1;
}
$user = new User($id);
 ?>

<div id="message"><?=$message?></div>

<form method="post" action="">

  <input type="hidden" name="id" value="<?=$id?>" />
  <label for="username">Username</label> <input type="text" name="username" value="<?=$user->username?>"/><br />
  <label for="password">Password</label> <input type="text" name="password" value="<?=$user->password?>"/><br />

  <label for="firstname">First Name</label> <input type="text" name="firstname"  value="<?=$user->firstName?>"/>  <label for="lastname">Last Name</label> <input type="text" name="lastname" value="<?=$user->lastName?>"/><br />
  <label for="email">Email Address</label> <input type="text" name="email" value="<?=$user->email?>" />

<br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
include "../views/partials/footer.php";
?>
