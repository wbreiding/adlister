<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../models/Ad.php";
require_once "../utils/Input.php";
?>

<?php
$id = Input::get('id');
$ad = new Ad($id);
 ?>
<div id="ad">
  <h3><?=$ad->name?> - $<?=$ad->price?></h3>

  <div id="location">location: <?=$ad->location?></div>

  <p>
    <img src="<?=$ad->image_url?>" /><br />
<?=$ad->description?></p>

<p>
  Make: <?=$ad->make?> <br />
  Model: <?=$ad->model?><br />
  Size: <?=$ad->size?> <br />
  Condition: <?=$ad->condition?>
</p>
</div>


<?php
include "../views/partials/footer.php";
?>
