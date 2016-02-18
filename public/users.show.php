<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";

require_once "../models/User.php";
require_once "../utils/Input.php";
?>

<?php

$user_id = 1;
$user = new User($user_id);

 ?>
<p>
  Username: <?=$user->username?><br />

  Name: <?=$user->firstName?> <?=$user->lastName?> <br />
  Email Address: <?=$user->email?><br />


<?php
include "../views/partials/footer.php";
?>
