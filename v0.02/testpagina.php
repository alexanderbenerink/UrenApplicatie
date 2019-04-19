<html lang="nl">

<?php
  require_once "php/Classes/Header.php";
  require_once "php/Classes/Head.php";
  require_once "php/Classes/TestPageNav.php";
  $header = new Header();
  $head = new Head();
  $nav = new TestPageNav();
?>

<head>
  <title> Test pagina </title>
  <?php
    echo $head -> getHead();
  ?>
</head>

<body>
  <?php
    echo $header -> getHeader();
  ?>
  <main>
    <h1>Test pagina</h1>
    <?php
      echo $nav -> getNav();
    ?>
  </main>
</body>

</html>