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
      } else {
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
    }
  }

  public function getAdByid($id) {
    return static::find('id',$id);

  }

  public static function getAllAds() {
    return static::all();
  }

  function insert() {
    self::dbConnect();

    $insert = "INSERT INTO :table (name,description,price,image_url,location,zip,make,model,size,itemCondition) VALUES (':name', ':description', ':price', ':image_url', ':location', ':zip', ':make', ':model', ':size',':condition')";
    $stmt = $dbc->prepare($insert);
    $rows = $stmt->execute(array(':table'=>$this->table, ':name'=>$this->adArray['name'], ':description'=>$this->adArray['description'], ':price'=>$this->adArray['price'], ':image_url'=>$this->adArray['image_url'], ':location'=>$this->adArray['location'], ':zip'=>$this->adArray['zip'], ':make'=>$this->adArray['make'], ':model'=>$this->adArray['model'], ':condition'=>$this->adArray['condition']));

    if ($rows == 1) {
      //insert was successful
    } else {
      //something went wrong
    }

  }

  function update() {
    self::dbConnect();

    $update = "UPDATE :table SET name = ':name', description = ':description', price = ':price', image_url = ':image_url', location = ':location', zip = ':zip', make = ':make', model = ':model', size=':size', itemCondition = ':condition' WHERE id = :id";
    $stme = $dbc->prepare($update);
    $rows = $stmt->execute(array(':table'=>$this->table, ':name'=>$this->adArray['name'], ':description'=>$this->adArray['description'], ':price'=>$this->adArray['price'], ':image_url'=>$this->adArray['image_url'], ':location'=>$this->adArray['location'], ':zip'=>$this->adArray['zip'], ':make'=>$this->adArray['make'], ':model'=>$this->adArray['model'], ':condition'=>$this->adArray['condition'], ':id'=>$this->adArray['id']));

    if ($rows == 1) {
      //insert was successful
    } else {
      //something went wrong
    }

  }


}
 ?>
