<?php
  require_once "../classes/DB.php";

  $view = $_POST["view"];
  $db = new DB();
  
  switch ( $view ) {
    case "urenregistratie":
      getHours( $db );
      break;
  }

  function getHours( $db ) {
    $params= array( "date" => $_POST["date"], "name" => "Emile" );
    $query = "SELECT * FROM gewerkte_uren WHERE datum = :date AND gebruiker = :name";
    $hours = $db -> collect($query, $params);
    echo json_encode( $hours );
  }