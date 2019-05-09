<?php
  require_once "../classes/DB.php";
  
  $params = array( "id" => $_POST["id"] );
  $query = "DELETE FROM projecten WHERE id = :id";
  $db = new DB();
  $db -> run( $query, $params );
