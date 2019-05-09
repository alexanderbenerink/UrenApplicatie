<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Project beheer </title>
  <?php
    echo $head -> getHead();
    echo $head -> getBootstrapCdn();
    echo $head -> getJQueryUiCdn();
  ?>
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
      <h1>Project beheer</h1>
      <p><strong>(Alleen voor beheerders)</strong></p>
      <hr>
      <section>
        <h2>Project aanmaken</h2>
        <form name="form-project" action="php/project-validator.php" method="POST">
          <input type="text" name="project" placeholder="project" required style="width: 250px">
          <input type="submit" value="Create">
        </form>
      </section>
      <hr>
      <section>
        <h2>Project overzicht</h2>
        <div id="wrapper" class="mb-4">
          <div class="row pl-2 pt-2">
            <div class="col-md"><p class="mb-2">Project</p></div>
            <div class="col-md"><p class="mb-2">Actie</p></div>
          </div>
          <div id="results"></div>
        </div>
      </section>
    </main>
  </div>

  <script src="js/projectbeheer/projectbeheer-model.js"></script>
</body>

</html>