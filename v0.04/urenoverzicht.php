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
        <p class="mb-1">Datum:</p>
        <input type="text" class="mb-2" id="datepicker" style="width: 250px">
        <input type="text" form="form-worked-hours" id="date" name="date" hidden>
        <p id="week-number">Week</p>
        <button class="btn btn-primary" id="prev-day">Vorige dag</button>
        <button class="btn btn-primary" id="today">Naar vandaag</button>
        <button class="btn btn-primary" id="next-day">Volgende dag</button>
        <br><br>
        <button class="btn btn-primary" id="next-day">Vorige week</button>
        <button class="btn btn-primary" id="next-day">Deze week</button>
        <button class="btn btn-primary" id="next-day">Volgende week</button>
        <br><br>
        <button type="button" class="btn btn-success">Alles</button>
        <hr>
      </section>
    </main>
  </div>

</body>

</html>