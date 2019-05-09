<?php
  require_once "../classes/DB.php";

  $db = new DB();
  $params= array( "name" => "Emile" );
  $query = "SELECT * FROM gewerkte_uren WHERE persoon = :name";
  $hours = $db -> fetchHours($query, $params);

  echo json_encode( $hours );