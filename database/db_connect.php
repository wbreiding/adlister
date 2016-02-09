<?php
// Get new instance of PDO object
$string = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$dbc = new PDO("$string", DB_USER, DB_PASS);

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
