<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/AccountRegNav.php";
  require_once "php/classes/DB.php";
  $header = new Header();
  $head = new Head();
  $nav = new AccountRegNav();
  $db = new DB();
?>

<head>
  <title> Account registratie </title>
  <?php
    echo $head -> getHead();
    echo $head -> getBootstrapCdn();
    echo $head -> getJQueryUiCdn();
  ?>
  <!-- Tijdelijke inline style -->
  <style>
    #wrapper {
      border: solid 1px black;
      background-color: rgb(153, 204, 255);
    }
    #results {
      border-top: solid 1px black;
    }
    #results > .hour-wrapper:nth-child(odd) {
      background-color: lightgray;
    }
    #results > .hour-wrapper:nth-child(even) {
      background-color: antiquewhite;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <?php
      echo $header -> getHeader();
    ?>
    <main>
      <h1>Account Beheer</h1>
      <?php
        echo $nav -> getNav();
      ?>
      <hr>
      <section>
        <h2> Account registratie </h2>
        <p><strong>(Alleen voor beheerders)</strong></p>
        <form>
          <label for="name">Naam:</label>
          <input type="text" id="name" name="name" style="width: 250px"><br>
          <label for="password">Wachtwoord: <strong>(In plain text!)</strong></label>
          <input type="text" id="password" name="password" style="width: 250px"><br>
          <label for="user-type">Gebruikers type:</label>
          <select name="user-type" id="user-type">
            <option value="gebruiker">Gebruiker</option>
            <option value="beheerder">Beheerder</option>
          </select><br>
        </form>
        <button id="submit">Ok</button>
      </section>
      <hr>
      <section>
        <h2>Gebruikers overzicht</h2>
        <div id="wrapper" class="mb-4">
          <div class="row pl-2 pt-2">
            <div class="col-md"><p class="mb-2">ID</p></div>
            <div class="col-md"><p class="mb-2">Naam</p></div>
            <div class="col-md"><p class="mb-2">Beheerder</p></div>
            <div class="col-md"><p class="mb-2">Actie</p></div>
          </div>
          <div id="results"></div>
        </div>
      </section>
    </main>
  </div>
  <script>
    $( document ).ready( function(){

      routine();

      $("#submit").click( function() {
        var results = getResults();
        insertUser( results );
      });
    });

    function routine() {
      getUsers( displayUsers );
    }

    function getUsers( callback ) {
      $.ajax({
        type: "POST",
        url: "php/library/dbRetrieve-api.php",
        data: { query : "SELECT id, naam, beheerder FROM gebruikers" },
        success: function( data ) {
          var result = JSON.parse( data );
          callback( result );
        }
      });
    }

    function displayUsers( data ) {
      for ( var i = 0; i < data.length; i++ ) {
        var wrapper = "<div class='hour-wrapper'>";
        var userType = data[i].beheerder;
        var action = "";
        if ( userType == 0 || userType == 1 ) { action += "<button onclick='deleteUser(" + data[i].id + ")'>Verwijder</button>"; }
        wrapper += "<div class='row pl-2 pt-2'>"
        wrapper += "<div class='col-md'><p class='mb-2'>" + data[i].id + "</p></div>";
        wrapper += "<div class='col-md'><p class='mb-2'>" + data[i].naam + "</p></div>";
        wrapper += "<div class='col-md'><p class='mb-2'>" + userType + "</p></div>";
        wrapper += "<div class='col-md'>" + action + "</div>";
        wrapper += "</div></div>"; 
        $( "#results" ).append( wrapper );
      }
    }

    function updateUser( user ) {
      
    }

    function deleteUser( id ) {
      $.ajax({
        type: "POST",
        url: "php/library/dbDelete-api.php",
        data: { table : "gebruikers", id : id },
        success: function( data ) {
          $( "#results" ).empty();
          routine();
        }
      })
    }

    function getResults( ) {
      var object = new Object();
      object.name = $( "#name" ).val();
      object.password = $( "#password" ).val();
      object.userType = $( "#user-type" ).val();
      return object;
    }

    function insertUser( object ) {
      $.ajax({
        type: "POST",
        url: "php/library/accountReg-api.php",
        data: { name : object.name, password : object.password, userType: object.userType },
        success: function() {
          $( "#results" ).empty();
          routine();
        }
      });
    }
  </script>
</body>

</html>