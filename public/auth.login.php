<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>


<form method="post" action="">

  <label for="username">Username</label> <input type="text" name="username" /><br />
  <label for="password">Password</label> <input type="text" name="password" /><br />

  <input type="submit" name="submit" value="Login" />

</form>

<?php
include "../views/partials/footer.php";
?>
