<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/Footer.php";
  $head = new Head();
  $header = new Header();
  $footer = new Footer();
?>

<head>
  <title> Trenton B.V. - Urenvalidatie </title>
  <?php
    echo $head -> getBootstrapCdn();
    echo $head -> getHead();
  ?>
</head>

<body>
  <div class="container-fluid mt-3">
    <?php echo $header -> getHeader(); ?>
    <main class="mb-4">
      <h1>Urenvalidatie</h1>
      <div class="row no-gutters">
        <div class="col-1">
          <div id="mySidenav" class="sidenav">
            <a href="urenregistratieView.php">Urenregistratie</a>
            <a href="urenoverzichtView.php">Urenoverzicht</a>
            <a href="urenvalidatieView.php">Urenvalidatie</a>
            <a href="#">Verlof</a>
          </div>
        </div>
        <div class="col-11">
        <p class="mb-1">Datum:</p>
        <input type="text" class="mb-2" id="datepicker" style="width: 250px">
        <input type="text" form="form-worked-hours" id="date" name="date" hidden>
        <p id="week-number">Week</p>
        <button class="btn btn-success" id="prev-day">Vorige dag</button>
        <button class="btn btn-success" id="today">Naar vandaag</button>
        <button class="btn btn-success" id="next-day">Volgende dag</button>
        <br><br>
        <button class="btn btn-success" id="next-day">Vorige week</button>
        <button class="btn btn-success" id="next-day">Deze week</button>
        <button class="btn btn-success" id="next-day">Volgende week</button>
        <br><br>
        <button type="button" class="btn btn-success">Alles</button>
        </div>
      </div>
    </main>
    <?php echo $footer -> getFooter(); ?>
  </div>
</body>

</html>