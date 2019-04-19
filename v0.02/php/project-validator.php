<?php

  require_once "Classes/DB.php";

  $project = isset($_POST["project"]) ? $_POST["project"] : null;
  $db = new DB();
  $params = array( "project" => $project );
  $query = "INSERT INTO projecten( project ) VALUES( :project )";
  $db -> run( $query, $params );

  header("Location: ../projectbeheer.php");