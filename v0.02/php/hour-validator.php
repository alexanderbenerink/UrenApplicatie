<?php

  require_once "Classes/DB.php";

  $date = isset($_POST["date"]) ? $_POST["date"] : null;
  $project = isset($_POST["project"]) ? $_POST["project"] : null;
  $startTime = isset($_POST["start"]) ? $_POST["start"] : null;
  $endTime = isset($_POST["end"]) ? $_POST["end"] : null;
  $pause = isset($_POST["pause"]) ? $_POST["pause"] : null;

  $db = new DB();
  $params = array( "name" => "Emile",
    "date" => $date,
    "project" => $project,
    "start" => $startTime,
    "end" => $endTime,
    "pause" => $pause
  );
  $query = "INSERT INTO uren ( Naam, Datum, Project, Begin, Eind, Pauze ) VALUES( :name, :date, :project, :start, :end, :pause )";
  $db -> run( $query, $params );

  header("Location: ../urenregistratie.php");