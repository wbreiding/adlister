<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../models/Ad.php";
require_once "../utils/Input.php";
?>

<?php
$message = "";
if (Input::get('submit') == "Submit") {
  $ad = new Ad(Input::get('id'), Input::get('name'), Input::get('description'), Input::get('price'), Input::get('image_url'), Input::get('location'), Input::get('zip'), Input::get('make'), Input::get('model'), Input::get('size'), Input::get('condition'));
  $ad->update();
  $message = "You have successfully updated your ad.";
  $id = $ad->id;

} else {
  $id = Input::get('id');
}
if ($id != NULL) {
    $ad = new Ad($id);
?>
<div id="message"><?=$message?></div>

<form method="post" action="ads.edit.php">
<input type="hidden" name="id" value="<?=$ad->id?>" />
<label for="title">Name</label> <input type="text" name="name" value="<?=$ad->name?>"/> <label for="price">Price</label> $<input type="text" name="price" size="5" value="<?=$ad->price?> "/><br />
<label for="location">Specific Location</label> <input type="text" name="location" value="<?=$ad->location?> "/>   <label for="zip">Postal code</label> <input type="text" name="zip" size="7" value="<?=$ad->zip?>"/><br />
<label for="image_url">Image</label> <!--input type="file" name="pic" accept="image/*" / --><input type="text" name="image_url" value="<?=$ad->image_url?>" /><br />
<label for="description">Description</label><br />
<textarea name="description" cols="40" rows="10"><?=$ad->description?> </textarea>

<p>
<label for="make">Make/Manufacturer</label> <input type="text" name="make" value="<?=$ad->make?> "/> <label for="model">Model name/number</label> <input type="text" name="model" value="<?=$ad->model?> "/> <br />
<label for="size">size</label><input type="text" name="size"  value="<?=$ad->size?>" /> <label for="condition">Condition</label> <select name="condition">
  <option value="new" <?php if (strtolower($ad->condition) == "new") :?> selected <?php endif ?>>New</option>
  <option value="like new" <?php if (strtolower($ad->condition) == "like new") :?> selected <?php endif ?>>Like New</option>
  <option value="excellent" <?php if (strtolower($ad->condition) == "execellent") :?> selected <?php endif ?>>Excellent</option>
  <option value="good" <?php if (strtolower($ad->condition) == "good") :?> selected <?php endif ?>>Good</option>
  <option value="fair" <?php if (strtolower($ad->condition) == "fair") :?> selected <?php endif ?>>Fair</option>
  <option value="salvage" <?php if (strtolower($ad->condition) == "salvage") :?> selected <?php endif ?>>Salvage</option>
</select>
</p>

<input type="submit" name="submit" value="Submit" />
</form>
<?php
} else {
  $adList = Ad::getAllAds();
  $adsArray = $adList->attributes;
?>
  <ul>
    <?php foreach ($adsArray as $ad):?>
      <li id="EditListing"><a href="ads.edit.php?id=<?=$ad['id']?>"><?=$ad['name']?> - $<?=$ad['price']?></a></li>
    <?php endforeach?>
  </ul>
<?php } ?>



<?php
include "../views/partials/footer.php";
?>
