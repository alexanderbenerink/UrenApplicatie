<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Account beheer </title>
  <?php
    echo $head -> getHead();
  ?>
</head>

<body>
  <?php
    echo $header -> getHeader();
  ?>
  <main>
    <h1>Account beheer</h1>
  </main>
</body>

</html>