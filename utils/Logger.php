<?php

  Class Logger {
    public $filename;
    public $handle;

    public function __construct($prefix='log') {
      date_default_timezone_set("America/Chicago");
      $dt = new DateTime();
      $date = $dt->format('Y-m-d');

      $this->filename = "{$prefix}-{$date}.log";
      $this->handle = fopen($this->filename, 'a');

    }

    public function __destruct() {
      fclose($this->handle);

    }
    public function logMessage($logLevel, $message) {
      date_default_timezone_set("America/Chicago");
      $dt = new DateTime();
      $logDate = $dt->format('Y-m-d h:i:s');

      // do error messages here
      //YYYY-MM-DD HH:MM:SS [LEVEL] MESSAGE
      $msg = "{$logDate} [{$logLevel}] {$message}";
      fwrite($this->handle, PHP_EOL . $msg);

    }

    public function info($message) {
      $this->logMessage("INFO", $message);
    }

    public function error($message) {
      $this->logMessage("ERROR", $message);
    }
  }
 ?>
