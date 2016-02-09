<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>

<?php
$user = [
    'id' => 100,
    'username' => 'wbreiding',
    'firstName' => 'Wendy',
    'lastName' => 'Breiding',
    'email' => 'wdibean@gmail.com'
]
 ?>
<p>
  Username: <?=$user['username']?><br />

  Name: <?=$user['firstName']?> <?=$user['lastName']?> <br />
  Email Address: <?=$user['email']?><br />


<?php
include "../views/partials/footer.php";
?>
