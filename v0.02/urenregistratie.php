<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/Classes/Header.php";
  require_once "php/Classes/Head.php";
  require_once "php/Classes/HourAdminNav.php";
  require_once "php/Classes/DB.php";
  $header = new Header();
  $head = new Head();
  $nav = new HourAdminNav();
  $db = new DB();
  $projects = array();
  $query = "SELECT * FROM projecten";
  $projects = $db -> fetchProjects( $query );
?>

<head>
  <title> Urenadministratie </title>
  <?php
    echo $head -> getBootstrapCdn();
    echo $head -> getHead();
    echo $head -> getJQueryUiCdn();
    echo $head -> getDatePickerCdn();
    echo $head -> getTimerPickerCdn();
  ?>
</head>

<body>
  <div class="container-fluid">
    <?php
      echo $header -> getHeader();
    ?>
    <main>
      <h1>Urenadministratie</h1>
      <h2>Urenregistratie</h2>
      <?php
        echo $nav -> getNav();
      ?>
      <hr>
      <p class="mb-1">Datum:</p>
      <input type="text" class="mb-2" id="datepicker" style="width: 250px">
      <p id="week-number">Week</p>
      <button id="today">Naar vandaag</button>
      <hr>
      <!-- Dag 1 -->
      <h4>Maandag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-1" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-1">
              <div class="d-flex flex-column flex-md-row justify-content-around">
            
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-1"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
               <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-1">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                  </div>
                </div>
                <input type="text" id="date-1" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 2 -->
      <h4>Dinsdag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-2" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-2">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-2"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-2">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-2" name="date" hidden>
              
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 3 -->
      <h4>Woensdag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-3" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-3">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-3"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-3">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-3" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 4 -->
      <h4>Donderdag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-4" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-4">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-4"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-4">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-4" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 5 -->
      <h4>Vrijdag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-5" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-5">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-5"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-5">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-5" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 6 -->
      <h4>Zaterdag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-6" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-6">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-6"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-6">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-6" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Dag 7 -->
      <h4>Zondag</h4>
      <div class="row mb-4">
        <div class="col-12">
          <form name="form-day-7" action="php/hour-validator.php" method="POST">
            <fieldset id="fieldset-day-7">
              <div class="d-flex flex-column flex-md-row justify-content-around">
              
                <div class="col-md d-flex flex-column">
                  <div class="hour-header pl-2 pt-2">
                    <p id="day-7"></p>
                  </div>
                  <div class="hour-content p-2">
                    <select name="project" class="form-control form-control-md">
                    <?php
                      for ( $i = 0; $i < count($projects); $i++ ) {
                        $project = $projects[$i];
                        echo "
                          <option value='$project'>$project</option>
                        ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Start</p></div>
                  <div class="col hour-content p-2">
                    <input type="text" id="start" name="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Eind</p></div>
                  <div class="col hour-content p-2">
                  <input type="text" id="end" name="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" placeholder="00:00" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Pauze</p></div>
                  <div class="col hour-content p-2">
                    <input type="number" name="pause" min="0" placeholder="minuten" required>
                  </div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Status</p></div>
                  <div class="col hour-content p-2"><p class="mb-0" id="status-day-7">Open</p></div>
                </div>
                <div class="col-md d-flex flex-column">
                  <div class="col hour-header pl-2 pt-2"><p>Opslaan</p></div>
                  <div class="col hour-content p-2">
                    <input type="submit" name="submit" value="Opslaan">
                </div>
              </div>
              <input type="text" id="date-7" name="date" hidden>

              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script src="js/datepicker-view.js"></script>
  <script src="js/timepicker-view.js"></script>
  <script src="js/datepicker-model.js"></script>
  <script>
    $( document ).ready( function() {
      $( "#today" ).click( function() {
        $( "#datepicker" ).datepicker("setDate", new Date() );
        routine();
      });
    });
  </script>
</body>

</html>