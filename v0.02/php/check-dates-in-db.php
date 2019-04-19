<?php

  require_once "Classes/DB.php";

  $db = new DB();
  $dates = array();
  $query = "SELECT * FROM uren WHERE Naam = :name AND Datum = :date";
  for ( $i = 0; $i < 7; $i++ ) {
    $params = array( "name" => "Emile", "date" => $_POST["status"][$i] );
    array_push( $dates, $db -> fetchDays($query, $params) );
  }
  
  echo json_encode($dates);