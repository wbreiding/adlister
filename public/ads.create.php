<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>

<form method="post" action="">

<label for="title">Title</label> <input type="text" name="title" /> <label for="price">Price</label> $<input type="text" name="price" size="5" /><br />
<label for="location">Specific Location</label> <input type="text" name="location" />   <label for="zip">Postal code</label> <input type="text" name="zip" size="7" /><br />
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
