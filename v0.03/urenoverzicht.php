<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/HourAdminNav.php";
  $header = new Header();
  $head = new Head();
  $nav = new HourAdminNav();
?>

<head>
  <title> Urenoverzicht </title>
  <?php
    echo $head -> getHead();
    echo $head -> getBootstrapCdn();
    echo $head -> getJQueryUiCdn();
    echo $head -> getDatePicker();
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
      <h1>Urenadministratie</h1>
      <?php
        echo $nav -> getNav();
      ?>
      <hr>
      <section>
        <h2>Urenoverzicht</h2>
        <hr>
        <div id="wrapper" class="mb-4">
          <div class="row pl-2 pt-2">
            <div class="col-md"><p class="mb-2">Datum</p></div>
            <div class="col-md"><p class="mb-2">Project</p></div>
            <div class="col-md"><p class="mb-2">Start</p></div>
            <div class="col-md"><p class="mb-2">Eind</p></div>
            <div class="col-md"><p class="mb-2">Pauze</p></div>
            <div class="col-md"><p class="mb-2">Gewerkte uren</p></div>
            <div class="col-md"><p class="mb-2">Status</p></div>
            <div class="col-md"><p class="mb-2">Aanvraag datum</p></div>
            <div class="col-md"><p class="mb-2">Validate datum</p></div>
          </div>
          <div id="results"></div>
        </div>
        <p>Totaal gewerkte uren: </p>
      </section>
    </main>
  </div>

  <script src="js/urenoverzicht/urenoverzicht-model.js"></script>
  <script src="js/hour-calculator.js"></script>
</body>

</html>