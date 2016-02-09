<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ad_list');
define('DB_USER', 'ads_user');
define('DB_PASS', 'adsUser');
require "db_connect.php";
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'DROP TABLE IF EXISTS user';
$dbc->exec($query);
$query2 = 'CREATE TABLE user (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL UNIQUE,
  password varchar(100),
  firstName varchar(100),
  lastName varchar(100),
  email varchar(255),
  PRIMARY KEY (id)
 )';
 $dbc->exec($query2);

 $query3 = 'DROP TABLE IF EXISTS ad';
 $dbc->exec($query3);

 $query4 = 'CREATE TABLE ad (
   id INT UNSIGNED NOT NULL AUTO_INCREMENT,
   user_id INT UNSIGNED NOT NULL,
   name varchar(255),
   description text,
   price float,
   image_url varchar(255),
   location varchar(255),
   zip varchar(10),
   make varchar(255),
   model varchar(255),
   size varchar(255),
   itemCondition varchar(25),
   PRIMARY KEY (id),
   FOREIGN KEY (user_id)
      REFERENCES user(id)
      ON DELETE CASCADE
 )';

 $dbc->exec($query4);

 ?>
