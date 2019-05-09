<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Trenton B.V. - Urenapplicatie </title>
  <?php
    echo $head -> getHead();
  ?>
</head>

<body>
  <div class="container-fluid">
    <?php
      echo $header -> getHeader();
    ?>
    <main>
      <h1>Home</h1>
      <p>Welkom</p>
    </main>
  </div>
</body>

</html>