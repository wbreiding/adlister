<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>

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
