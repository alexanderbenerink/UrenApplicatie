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
  <title> Trenton B.V. - Urenregistratie </title>
  <?php
    echo $head -> getBootstrapCdn();
    echo $head -> getHead();
    echo $head -> getJQueryUiCdn();
    echo $head -> getDatePicker();
    echo $head -> getTimePicker();
  ?>
</head>

<body>
  <div class="container-fluid mt-3">
    <?php echo $header -> getHeader(); ?>
    <main class="mb-4">
      <h1>Urenregistratie</h1>
      <div class="row no-gutters">
        <div class="col-1 mr-1">
          <div id="mySidenav" class="sidenav">
            <a href="urenregistratieView.php">Urenregistratie</a>
            <a href="urenoverzichtView.php">Urenoverzicht</a>
            <a href="urenvalidatieView.php">Urenvalidatie</a>
            <a href="#">Verlof</a>
          </div>
        </div>
        <div class="col-10">
          <p class="mb-1">Datum:</p>
          <input type="text" class="mb-2" id="datepicker" style="width: 250px">
          <input type="text" form="form-hours" id="date" name="date" hidden>
          <p id="week-number">Week</p>
          <button class="btn btn-success" id="prev-day">Vorige dag</button>
          <button class="btn btn-success" id="today">Naar vandaag</button>
          <button class="btn btn-success" id="next-day">Volgende dag</button>
          <hr>
          <div id="wrapper">
            <div class="row pl-2 pt-2" style="color: white">
              <div class="col-md"><p class="mb-2">Project</p></div>
              <div class="col-md"><p class="mb-2">Start</p></div>
              <div class="col-md"><p class="mb-2">Eind</p></div>
              <div class="col-md"><p class="mb-2">Pauze</p></div>
              <div class="col-md"><p class="mb-2">Status</p></div>
            </div>
            <div id="results"></div>
            <form name="form-hours" id="form-hours" action="php/hour-validator.php" method="POST">
              <div class="row pl-2 pt-2 mb-2">
                <div class="col-md">
                  <select name="project" class="form-control form-control-sm">
                    <option value="Urenapplicatie">Urenapplicatie</option>
                  </select>
                </div>
                <div class="col-md">
                  <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                </div>
                <div class="col-md">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                </div>
                <div class="col-md">
                  <input type="number" name="pause" min="0" placeholder="minuten" required>
                </div>
                <div class="col-md">
                  <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <?php echo $footer -> getFooter(); ?>
  </div>
  
  <script src="js/models/timepicker-model.js"></script>
  <script src="js/models/datepicker-model.js"></script>
  <script src="js/models/urenadministratie-model.js"></script>
  <script src="js/models/urenregistratie-model.js"></script>
</body>

</html>