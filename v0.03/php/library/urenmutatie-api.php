<?php
  require_once "../classes/DB.php";
  
  $params;
  $query;

  if ( $_POST["action"] == "accept" ) {
    $params = array( "id" => $_POST["id"], "date" => $_POST["date"] );
    $query = "UPDATE gewerkte_uren SET status= 'Gevalideerd', validate_datum= :date WHERE id = :id";
  } else if ( $_POST["action"] == "decline" ) {
    $params = array( "id" => $_POST["id"] );
    $query = "DELETE FROM gewerkte_uren WHERE id = :id";
  }
  
  $db = new DB();
  $db -> run( $query, $params );