<html lang="nl">

<?php
  require_once "php/Classes/Header.php";
  require_once "php/Classes/Head.php";
  require_once "php/Classes/HourAdminNav.php";
  $header = new Header();
  $head = new Head();
  $nav = new HourAdminNav();
?>

<head>
  <title> Urenadministratie </title>
  <?php
    echo $head -> getHead();
  ?>
</head>

<body>
  <?php
    echo $header -> getHeader();
  ?>
  <main>
    <h1>Urenadministratie</h1>
    <?php
      echo $nav -> getNav();
    ?>
  </main>
</body>

</html>