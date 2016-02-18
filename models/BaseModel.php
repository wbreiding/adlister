<?php
$_ENV = include '../.env.php';
abstract class BaseModel {

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        if (!self::$dbc)
        {
            // @TODO: Connect to database
            $string = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'];
            $dbc = new PDO("$string", $_ENV['DB_USER'], $_ENV['DB_PASS']);

            // Tell PDO to throw exceptions on error
            $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        return $dbc;
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        // @TODO: Return the value from attributes with a matching $name, if it exists
        return (array_key_exists($name,$this->attributes) ? $this->attributes[$name] : "");
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        // @TODO: Store name/value pair in attributes array
        $this->$attributes[$name] = $value;
    }

    /*
     * Persist the object to the database
     */
    public function save($type, $query, $array) {

        $dbc = self::dbConnect();


        $stmt = $dbc->prepare($query);
        $rows = $stmt->execute($array);

        if ($type == 'insert' && $rows == 1) {
          //was successful
          $this->id = $dbc->lastInsertId();
          return $this->id;
        } elseif ($type == 'update' && $rows == 1) {

        } else {
          //something went wrong
        }


    }

    /*
     * Find a record based on any column
     */
    public static function find($column,$value) {
        // Get connection to the database
        $dbc = self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $tbl = static::$table;
        $query = "SELECT * FROM {$tbl} WHERE {$column} = :id";
        $result = $dbc->prepare($query);
        $result->bindValue(':id', $value, PDO::PARAM_INT);

        // @TODO: Store the resultset in a variable named $result
        $result->execute();
        // The following code will set the attributes on the calling object based on the result variable's contents
        $results = $result->fetch(PDO::FETCH_ASSOC);
        $instance = null;
        if ($results) {
            $instance = new static();
            $instance->attributes = $results;
            return $instance;
        }
        return null;

    }

    public static function findMultiple($column,$value) {
        // Get connection to the database
        $dbc = self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $tbl = static::$table;
        $query = "SELECT * FROM {$tbl} WHERE {$column} = :id";
        $result = $dbc->prepare($query);
        $result->bindValue(':id', $value, PDO::PARAM_INT);

        // @TODO: Store the resultset in a variable named $result
        $result->execute();
        // The following code will set the attributes on the calling object based on the result variable's contents
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        $instance = null;
        if ($results) {
            $instance = new static();
            $instance->attributes = $results;
            return $instance;
        }
        return null;

    }
    /*
     * Find all records in a table
     */
    public static function all()
    {
        $dbc = self::dbConnect();

        // @TODO: Learning from the previous method, return all the matching records
        $tbl = static::$table;
        $query = "SELECT * FROM {$tbl}";
        $result = $dbc->prepare($query);

        // @TODO: Store the resultset in a variable named $result
        $result->execute();

        // The following code will set the attributes on the calling object based on the result variable's contents
        $results = $result->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($results)
        {
            $instance = new static();
            $instance->attributes = $results;
        }
        return $instance;
    }

}
 ?>
