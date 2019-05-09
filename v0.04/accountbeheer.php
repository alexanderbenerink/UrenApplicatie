<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/AccountRegNav.php";
  $header = new Header();
  $head = new Head();
  $nav = new AccountRegNav();
?>

<head>
  <title> Account beheer </title>
  <?php
    echo $head -> getHead();
    echo $head -> getBootstrapCdn();
  ?>
</head>

<body>
  <div class="container-fluid">
    <?php
      echo $header -> getHeader();
    ?>
    <main>
      <h1>Account beheer</h1>
      <?php
        echo $nav -> getNav();
      ?>
      <hr>
      <p>...</p>
    </main>
  </div>
</body>

</html>