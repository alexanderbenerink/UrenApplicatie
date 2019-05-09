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
      </section>
    </main>
  </div>

</body>

</html>