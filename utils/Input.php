<?php

class DateRangeException extends Exception {}
class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        $answer = (isset($_REQUEST[$key]) ? (bool)'true' : (bool)'');
        return $answer;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    protected static function escape($input) {
       return htmlspecialchars(strip_tags($input));
    }

    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        $answer = (isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default);
        return $answer;
    }

    public static function getString($key, $min = 0, $max = 100) {
      if (!is_string($key) || !is_numeric($min) || !is_numeric($max)) {
        throw new InvalidArgumentException("{$key} is not a string or {$min} or {$max} are not numbers");
      }
      $string = (static::has($key) ? static::get($key) : "");
      if (is_null($string)) {
          throw new OutOfRangeException("{$key} does not exist");
      }
      if (!is_string($string)) {
        throw new DomainException("{$string} is not a string");
      }
      if (strlen($string) < $min || strlen($string) > $max) {
        throw new LengthException("{$string} is not the right length.");
      }
      return self::escape($string);

    }

    public static function getNumber($key, $min = 0, $max = 10000) {
      if (!is_string($key) || !is_numeric($min) || !is_numeric($max)) {
        throw new InvalidArgumentException("{$key} is not a string or {$min} or {$max} are not numbers");
      }
      $num = (static::has($key) ? static::get($key) : "");
      if (is_null($num)) {
        throw new OutOfRangeException("{$key} does not exist");
      }
      if (!is_numeric($num)) {
        throw new DomainException("{$num} is not a number");
      }
      if ($num < $min || $num > $max) {
        throw new RangeException("{$num} is smaller than {$min} or bigger than {$max}");
      }
      return (float)$num;
    }

    public static function getDate($key, $min = "1970-01-01", $max = "2222-12-31") {
      if (!is_string($key)) {
        throw new InvalidArgumentException("{$key} is not a string");
      }
      if (!DateTime::createFromFormat('Y-m-d', $min) || !DateTime::createFromFormat('Y-m-d', $max)) {
        throw new InvalidArgumentException("{$min} or {$max} are not valid dates.");
      };
      $date = (static::has($key) ? static::get($key) : "");
      if (is_null($date)) {
        throw new OutOfRangeException("{$key} does not exist");
      }
      if (!(bool)strtotime($date)) {
        throw new DomainException("{$date} is not a date.");
      }
      $minDate = new DateTime($min);
      $maxDate = new DateTime($max);
      $dt = new DateTime($date);
      if ($dt < $minDate || $dt > $maxDate) {
        throw new DateRangeException("{$date} is not between {$min} and {$max}");
      }
      return $dt;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
