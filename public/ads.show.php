<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>

<?php
$ad = [
        'id'          => 100,
        'user_id'     => 100,
        'name'        => 'Build a Bear',
        'description' => 'Build a bear hello kitty in pink<br />Blouses,skirts,shoes,accessories and build a bear closet',
        'price'       => 60.00,
        'image_url'   => '/img/uploads/100.jpg',
        'location'    => 'Bulverde & Evans',
        'zip'         => '78259',
        'make'        => 'Build-a-bear',
        'model'       => 'N/A',
        'size'        => 'big',
        'condition'   => 'Like New'
    ];
 ?>
<div id="ad">
  <h3><?=$ad['name']?> - $<?=$ad['price']?></h3>

  <div id="location">location: <?=$ad['location']?></div>

  <p>
    <img src="<?=$ad['image_url']?>" /><br />
<?=$ad['description']?></p>

<p>
  Make: <?=$ad['make']?> <br />
  Model: <?=$ad['model']?><br />
  Size: <?=$ad['size']?> <br />
  Condition: <?=$ad['condition']?>
</p>
</div>


<?php
include "../views/partials/footer.php";
?>
