<?php
  require_once "../classes/DB.php";
  
  $query = $_POST["query"];
  $db = new DB();
  $array = $db -> collect( $query );
  echo json_encode( $array );
