<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";

require_once "../models/User.php";
require_once "../utils/Input.php";
?>

<?php
$message = "";

if (Input::get('submit') == "Submit") {
  $user = new User(NULL, Input::get('username'), Input::get('password'), Input::get('firstname'), Input::get('lastname'), Input::get('email'));
  $user->insert();
  $message = "You have successfully added a user.";
  $id = $user->id;

}
 ?>
<div id="message"><?=$message?></div>

<form method="post" action="">

  <label for="username">Username</label> <input type="text" name="username" /><br />
  <label for="password">Password</label> <input type="text" name="password" /><br />

  <label for="firstname">First Name</label> <input type="text" name="firstname" />  <label for="lastname">Last Name</label> <input type="text" name="lastname" /><br />
  <label for="email">Email Address</label> <input type="text" name="email" />

<br />
<input type="submit" name="submit" value="Submit" />
</form>
<?php
include "../views/partials/footer.php";
?>
