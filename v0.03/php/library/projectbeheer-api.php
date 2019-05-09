<?php
  require_once "../classes/DB.php";
  
  $db = new DB();
  $query = "SELECT * FROM projecten";
  $projects = $db -> fetchProjects( $query );

  echo json_encode( $projects );