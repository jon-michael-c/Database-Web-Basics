<?php
  class Connect extends PDO{
    // DB Params
      private $host = 'localhost';
      private $db_name = 'testdb';
      private $username = 'root';
      private $password = '12345'
      private $conn;
	
    // DB Connect
    public function __construct() {
   	parent::__contruct('mysql:host=localhost;dbname=testdb','root', '12345', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$this->setAttribute( PDO::ATTR_EMULATE_PREPARES, false);  

    }
}
?>


