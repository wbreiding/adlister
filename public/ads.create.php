<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../models/Ad.php";
require_once "../utils/Input.php";
?>

<?php
$message = "";
if (Input::get('submit') == "Submit") {
  $ad = new Ad(NULL, Input::get('name'), Input::get('description'), Input::get('price'), Input::get('image_url'), Input::get('location'), Input::get('zip'), Input::get('make'), Input::get('model'), Input::get('size'), Input::get('condition'));
  $ad->insert();
  $message = "You have successfully submitted your ad.";
  $id = $ad->id;

}

?>

<div id="message"><?=$message?></div>

<form method="post" action="">

<label for="name">Item</label> <input type="text" name="name" /> <label for="price">Price</label> $<input type="text" name="price" size="5" /><br />
<label for="location">Specific Location</label> <input type="text" name="location" />   <label for="zip">Postal code</label> <input type="text" name="zip" size="7" /><br />
<label for="image_url">Image</label> <!--input type="file" name="pic" accept="image/*" / --><input type="text" name="image_url" /><br />
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
