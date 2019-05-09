<?php

  class DB {

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "[project-dummy-db]";
    public $conn;

    public function __construct() {
      try {
        $this -> conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $this -> conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      } catch (Exception $e){}
    }

    public function run( $query, $params ) {
      $stmt = $this -> conn->prepare( $query );
      $stmt->execute( $params );
    }

    public function collect( $query ) {
      $array = array();
      $stmt = $this -> conn->prepare( $query );
      $stmt->execute();
      while( $row = $stmt -> fetch(PDO::FETCH_ASSOC) ) {
        array_push( $array, $row );
      }
      return $array;
    }

  }