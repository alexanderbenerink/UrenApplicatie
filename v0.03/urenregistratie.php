<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/HourAdminNav.php";
  require_once "php/classes/DB.php";
  $header = new Header();
  $head = new Head();
  $nav = new HourAdminNav();
  $db = new DB();
  $projects = array();
  $query = "SELECT * FROM projecten";
  $projects = $db -> fetchProjects( $query );
?>

<head>
  <title> Urenregistratie </title>
  <?php
    echo $head -> getHead();
    echo $head -> getBootstrapCdn();
    echo $head -> getJQueryUiCdn();
    echo $head -> getDatePicker();
    echo $head -> getTimePicker();
  ?>
  <!-- Tijdelijke inline style -->
  <style>
    #wrapper {
      border: solid 1px black;
      background-color: rgb(153, 204, 255);
    }
    #results {
      border-top: solid 1px black;
      border-bottom: solid 1px black;
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
        <h2>Urenregistratie</h2>
        <p class="mb-1">Datum:</p>
        <input type="text" class="mb-2" id="datepicker" style="width: 250px">
        <input type="text" form="form-work-hours" id="date" name="date" hidden>
        <p id="week-number">Week</p>
        <button class="btn btn-primary" id="prev-day">Vorige dag</button>
        <button class="btn btn-primary" id="today">Naar vandaag</button>
        <button class="btn btn-primary" id="next-day">Volgende dag</button>
        <hr>
        <div id="wrapper">
          <div class="row pl-2 pt-2">
            <div class="col-md"><p class="mb-2">Project</p></div>
            <div class="col-md"><p class="mb-2">Start</p></div>
            <div class="col-md"><p class="mb-2">Eind</p></div>
            <div class="col-md"><p class="mb-2">Pauze</p></div>
            <div class="col-md"><p class="mb-2">Status</p></div>
          </div>
          <div id="results"></div>
          <form name="form-work-hours" id="form-work-hours" action="php/hour-validator.php" method="POST">
            <div class="row pl-2 pt-2 mb-2">
              <div class="col-md">
                <select name="project" class="form-control form-control-sm">
                <?php
                  for ( $i = 0; $i < count($projects); $i++ ) {
                    $project = $projects[$i]["naam"];
                    echo "
                      <option value='$project'>$project</option>
                    ";
                  }
                ?>
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
      </section>
    </main>
  </div>
  <script src="js/urenregistratie/urenregistratie-model.js"></script>
  <script src="js/datepicker/datepicker-model.js"></script>
  <script src="js/timepicker/timepicker-model.js"></script>
</body>

</html>