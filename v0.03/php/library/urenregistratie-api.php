<?php
  require_once "../classes/DB.php";

  $db = new DB();
  $params= array( "date" => $_POST["date"], "name" => "Emile" );
  $query = "SELECT * FROM gewerkte_uren WHERE datum = :date AND persoon = :name";
  $hours = $db -> fetchHours($query, $params);

  echo json_encode( $hours );
