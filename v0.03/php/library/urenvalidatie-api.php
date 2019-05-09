<?php
  require_once "../classes/DB.php";

  $db = new DB();
  $params= array( "status" => "In afwachting" );
  $query = "SELECT * FROM gewerkte_uren WHERE status = :status";
  $hours = $db -> fetchHours($query, $params);

  echo json_encode( $hours );