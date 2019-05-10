<?php

  require_once "Classes/DB.php";

  $date = isset($_POST["date"]) ? $_POST["date"] : null;
  $project = isset($_POST["project"]) ? $_POST["project"] : null;
  $startTime = isset($_POST["start"]) ? $_POST["start"] : null;
  $endTime = isset($_POST["end"]) ? $_POST["end"] : null;
  $pause = isset($_POST["pause"]) ? $_POST["pause"] : null;

  $query = "INSERT INTO gewerkte_uren ( datum, gebruiker, project, start, eind, pauze ) VALUES ( :date, :user, :project, :start, :end, :pause )";
  $params = array( "date" => $date,
    "user" => "Emile",
    "project" => $project,
    "start" => $startTime,
    "end" => $endTime,
    "pause" => $pause
  );
  $db = new DB();
  $db -> run( $query, $params );

 header("Location: ../urenregistratieView.php");