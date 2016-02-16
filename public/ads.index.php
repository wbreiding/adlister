<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
require_once "../models/Ad.php";
require_once "../utils/Input.php";
?>


<?php
$adList = Ad::getAllAds();
$adsArray = $adList->attributes;



$count = 1;
 ?>
<div id="adList">
  <?php foreach ($adsArray as $ad):?>
    <div id="listing"><div id="list<?=$count?>"><a href="ads.show.php?id=<?=$ad['id']?>"><img src="<?=$ad['image_url']?>" border="0" height="100" /><br />
    <?=$ad['name']?> - $<?=$ad['price']?></a></div></div>
    <?php if ($count%3 == 0):?>
      <br />
      <?php $count = 1?>
    <?php else:?>
    <?php $count++ ?>
  <?php endif ?>
  <?php endforeach?>
</div>


<?php
include "../views/partials/footer.php";
?>
