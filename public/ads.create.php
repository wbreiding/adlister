<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../models/Ad.php";
require_once "../utils/Input.php";
?>

<?php
$message = "";
if (Input::get('submit') == "Submit") {

  //upload Image first
  $target_dir = "img/uploads/";
  $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $message =  "File is not an image.";
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      $message =  "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["imageToUpload"]["size"] > 500000) {
     $message =  "Sorry, your file is too large.";
     $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $message = $message . "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
          $message =  "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
          //create ad and insert into database
          $ad = new Ad(NULL, Input::get('name'), Input::get('description'), Input::get('price'), $target_file, Input::get('location'), Input::get('zip'), Input::get('make'), Input::get('model'), Input::get('size'), Input::get('condition'));
          $ad->insert();
          $message = "You have successfully submitted your ad.";
          $id = $ad->id;
      } else {
          $message =  "Sorry, there was an error uploading your file.";
      }
  }



}




?>

<div id="message"><?=$message?></div>

<form method="post" action="" enctype="multipart/form-data">

<label for="name">Item</label> <input type="text" name="name" /> <label for="price">Price</label> $<input type="text" name="price" size="5" /><br />
<label for="location">Specific Location</label> <input type="text" name="location" />   <label for="zip">Postal code</label> <input type="text" name="zip" size="7" /><br />
<label for="imageToUpload">Image</label> <input type="file" name="imageToUpload" id="imageToUpload" accept="image/*" /><br />
<label for="description">Description</label><br />
<textarea name="description" cols="40" rows="10"></textarea>

<p>
<label for="make">Make/Manufacturer</label> <input type="text" name="make" /> <label for="model">Model name/number</label> <input type="text" name="model" /> <br />
<label for="size">size</label><input type="text" name="size"  placeholder="length x width x height" /> <label for="condition">Condition</label> <select name="condition">
  <option value="new">New</option>
  <option value="like new">Like New</option>
  <option value="excellent">Excellent</option>
  <option value="good">Good</option>
  <option value="fair">Fair</option>
  <option value="salvage">Salvage</option>
</select>
</p>

<input type="submit" name="submit" value="Submit" />
</form>

<?php
include "../views/partials/footer.php";
?>
