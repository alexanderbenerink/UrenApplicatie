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

    public function collect( $query, $params ) {
      $array = array();
      $stmt = $this -> conn->prepare( $query );
      $stmt->execute( $params );
      while( $row = $stmt -> fetch(PDO::FETCH_ASSOC) ) {
        array_push( $array, $row );
      }
      return $array;
    }

    public function getID( $query, $params ) {
      $stmt = $this -> conn->prepare( $query );
      $stmt->execute( $params );
      if ( $row = $stmt -> fetch(PDO::FETCH_ASSOC) ) {
        return $row["id"];
      }
    }

  }