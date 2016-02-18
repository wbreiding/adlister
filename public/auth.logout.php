<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../utils/Auth.php";
?>

<?php


  function pageController() {
    $data = array();
    session_start();
    if (Auth::check()) {
      Auth::logout();
      header("Location: index.php");
    } else {
      header("Location: index.php");
    }

    return $data;
  }

  extract(pageController());


 ?>

<?php
include "../views/partials/footer.php";
?>
