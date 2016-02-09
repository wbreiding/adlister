<?php
include "../views/partials/header.php";
include "../views/partials/navbar.php";
?>


<?php
$ads = [
    [
      'id'          => 100,
      'user_id'     => 100,
      'name'        => 'Build a Bear',
      'description' => 'Build a bear hello kitty in pink<br />Blouses,skirts,shoes,accessories and build a bear closet',
      'price'       => 60.00,
      'image_url'   => '/img/uploads/100.jpg',
      'location'    => 'Bulverde & Evans'
    ],
    [
      'id'          => 101,
      'user_id'     => 101,
      'name'        => 'Craftsmen bench for kids',
      'description' => 'Cute bench for kids. No tools included! <br />Text me at show contact info <br />Only inquire if you are picking up that day. NO HOLDS!',
      'price'       => 20.00,
      'image_url'   => '/img/uploads/101.jpg',
      'location'    => 'Hillcrest'
    ],
    [
      'id'          => 102,
      'user_id'     => 102,
      'name'        => 'Rainforest Travel Swing',
      'description' => '*** KOOL KIDS RESALE ***<br />Rainforest Travel Swing! $18<br />9708 Business Parkway 116 Helotes, 78023 Next to Wal Mart by OConner High School!<br />Hours:<br />10-8pm Mon-Fri.<br />11-8pm Sat.<br />11-8pm Sun.',
      'price'       => 18.00,
      'image_url'   => '/img/uploads/102.jpg',
      'location'    => '9708 Business Parkway ste 116'
    ]
];

$count = 1;
 ?>
<div id="adList">
  <?php foreach ($ads as $ad):?>
    <div id="listing"><div id="list<?=$count?>"><a href="ads.show.php"><img src="<?=$ad['image_url']?>" border="0" height="100" /><br />
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
