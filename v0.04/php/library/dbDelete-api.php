<?php
  require_once "../classes/DB.php";
  
  $table = $_POST["table"];
  $params = array( 
    "id" => $_POST["id"] 
  );
  $query = "DELETE FROM $table WHERE id = :id";
  $db = new DB();
  $db -> run( $query, $params );
