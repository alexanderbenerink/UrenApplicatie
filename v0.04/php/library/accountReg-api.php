<?php
  require_once "../classes/DB.php";

  $admin = false;
  if ( $_POST["userType"] == "beheerder" ) {
    $admin = true;
  }
  $params = array( "name" => $_POST["name"],
    "password" => $_POST["password"],
    "userType" => $admin
  );
  $query = "INSERT INTO gebruikers (naam, wachtwoord, beheerder) Values( :name, :password, :userType )";
  $db = new DB();
  $db -> run( $query, $params );
