<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ad_list');
define('DB_USER', 'ads_user');
define('DB_PASS', 'adsUser');
require_once "BaseModel.php";
class Ad extends BaseModel {

  protected static $table = 'ad';

  public $id;
  public $name;
  public $description;
  public $price;
  public $image_url;
  public $location;
  public $zip;
  public $make;
  public $model;
  public $size;
  public $condition;


  function __construct($id=NULL, $name=NULL, $description=NULL, $price=NULL, $image_url=NULL, $location=NULL, $zip=NULL, $make=NULL, $model=NULL, $size=NULL, $condition=NULL) {
      if ($id == NULL) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image_url = $image_url;
        $this->location = $location;
        $this->zip = $zip;
        $this->make = $make;
        $this->model = $model;
        $this->size = $size;
        $this->condition = $condition;
      } elseif ($name == NULL) {
        $newAd = static::getAdByid($id);
        if ($newAd == NULL) {
          return;
        }
        $this->id = $newAd->attributes['id'];
        $this->name = $newAd->attributes['name'];
        $this->description = $newAd->attributes['description'];
        $this->price = $newAd->attributes['price'];
        $this->image_url = $newAd->attributes['image_url'];
        $this->location = $newAd->attributes['location'];
        $this->zip = $newAd->attributes['zip'];
        $this->make = $newAd->attributes['make'];
        $this->model = $newAd->attributes['model'];
        $this->size = $newAd->attributes['size'];
        $this->condition = $newAd->attributes['itemCondition'];
    } else {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->price = $price;
      $this->image_url = $image_url;
      $this->location = $location;
      $this->zip = $zip;
      $this->make = $make;
      $this->model = $model;
      $this->size = $size;
      $this->condition = $condition;
    }
  }

  public function getAdByid($id) {
    return static::find('id',$id);

  }

  public static function getAllAds() {
    return static::all();
  }

  public function insert() {
    $tbl = self::$table;
    $user = 1;
    $insert = "INSERT INTO {$tbl} (user_id, name, description, price, image_url, location, zip, make, model, size, itemCondition) VALUES (:user_id, :name, :description, :price, :image_url, :location, :zip, :make, :model, :size, :condition)";
    $queryArray = array(':user_id'=>$user, ':name'=>$this->name, ':description'=>$this->description, ':price'=>(float)$this->price, ':image_url'=>$this->image_url, ':location'=>$this->location, ':zip'=>$this->zip, ':make'=>$this->make, ':model'=>$this->model, ':size'=>$this->size, ':condition'=>$this->condition);

    return static::save('insert', $insert, $queryArray);

  }

  function update() {
    $tbl = self::$table;
    $user = 1;

    $update = "UPDATE {$tbl} SET name = :name, description = :description, price = :price, image_url = :image_url, location = :location, zip = :zip, make = :make, model = :model, size=:size, itemCondition = :condition WHERE id = :id";
    $updateArray = array(':name'=>$this->name, ':description'=>$this->description, ':price'=>(float)$this->price, ':image_url'=>$this->image_url, ':location'=>$this->location, ':zip'=>$this->zip, ':make'=>$this->make, ':model'=>$this->model, ':size'=>$this->size, ':condition'=>$this->condition, ':id'=>$this->id);

    return static::save('update', $update, $updateArray);


  }


}
 ?>
