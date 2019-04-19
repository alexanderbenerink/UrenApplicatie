<html lang="nl">

<?php
  require_once "php/Classes/Header.php";
  require_once "php/Classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Trenton B.V. - Urenapplicatie </title>
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
      <h1>Home</h1>
    </main>
  </div>
</body>

</html>