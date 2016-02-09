<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ad_list');
define('DB_USER', 'ads_user');
define('DB_PASS', 'adsUser');
require "db_connect.php";
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$users = [
  ['username' => 'wbreiding',
  'password' => '',
  'firstName' => 'Wendy',
  'lastName' => 'Breiding',
  'email' => 'wdibean@gmail.com'],
  ['username' => 'jbreiding',
  'password' => '',
  'firstName' => 'Jade',
  'lastName' => 'Breiding',
  'email' => 'jadebreiding@icloud.com'],
  ['username' => 'mbreiding',
  'password' => '',
  'firstName' => 'Maxwell',
  'lastName' => 'Breiding',
  'email' => 'mbreiding@bob.com']
];

$ads = [
  ['user_id'     => 1,
  'name'        => 'Build a Bear',
  'description' => 'Build a bear hello kitty in pink<br />Blouses,skirts,shoes,accessories and build a bear closet',
  'price'       => 60.00,
  'image_url'   => '/img/uploads/100.jpg',
  'location'    => 'Bulverde & Evans',
  'zip'         => '78259',
  'make'        => 'Build-a-bear',
  'model'       => 'N/A',
  'size'        => 'big',
  'condition'   => 'Like New'],
  [
    'user_id'     => 1,
    'name'        => 'Craftsmen bench for kids',
    'description' => 'Cute bench for kids. No tools included! <br />Text me at show contact info <br />Only inquire if you are picking up that day. NO HOLDS!',
    'price'       => 20.00,
    'image_url'   => '/img/uploads/101.jpg',
    'location'    => 'Hillcrest',
    'zip'         => '78259',
    'make'        => 'Craftsmen',
    'model'       => 'N/A',
    'size'        => 'really big',
    'condition'   => 'Good'],
  [
    'user_id'     => 1,
    'name'        => 'Rainforest Travel Swing',
    'description' => '*** KOOL KIDS RESALE ***<br />Rainforest Travel Swing! $18<br />9708 Business Parkway 116 Helotes, 78023 Next to Wal Mart by OConner High School!<br />Hours:<br />10-8pm Mon-Fri.<br />11-8pm Sat.<br />11-8pm Sun.',
    'price'       => 18.00,
    'image_url'   => '/img/uploads/102.jpg',
    'location'    => '9708 Business Parkway ste 116',
    'zip'         => '78259',
    'make'        => 'Fisher Price',
    'model'       => 'N/A',
    'size'        => 'medium',
    'condition'   => 'Fair']
];
$dbc->exec('SET FOREIGN_KEY_CHECKS = 0;');
$query = 'TRUNCATE user';
$dbc->exec($query);

$query = 'TRUNCATE ad';
$dbc->exec($query);
$dbc->exec('SET FOREIGN_KEY_CHECKS = 1;');


  $query2 = 'INSERT INTO user (username,password,firstName,lastName,email) VALUES (:username, :password, :firstName, :lastName, :email)';
  $stmt = $dbc->prepare($query2);

  foreach ($users as $user) {
    $id = $stmt->execute(array(':username'=>$user['username'], ':password'=>$user['password'], ':firstName'=>$user['firstName'], ':lastName'=>$user['lastName'], ':email'=>$user['email']));
  }

  $query3 = 'INSERT INTO ad (user_id,name,description,price,image_url,location,zip,make,model,size,itemCondition) VALUES (:user_id, :name, :description, :price, :image, :location, :zip, :make, :model, :size, :condition)';
  $stmt = $dbc->prepare($query3);

  foreach ($ads as $ad) {
    $stmt->execute(array(':user_id'=>$ad['user_id'], ':name'=>$ad['name'], ':description'=>$ad['description'], ':price'=>$ad['price'], ':image'=>$ad['image_url'], ':location'=>$ad['location'], ':zip'=>$ad['zip'], ':make'=>$ad['make'], ':model'=>$ad['model'], ':size'=>$ad['size'], ':condition'=>$ad['condition']));
  }


 ?>
