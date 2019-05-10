<!DOCTYPE html>
<html lang="nl">

<?php
  header( "location: urenregistratieView.php" );
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/Footer.php";
  $head = new Head();
  $header = new Header();
  $footer = new Footer();
?>

<head>
  <title> Trenton B.V. - Urenapplicatie </title>
  <?php
    
  ?>
</head>

<body>
  <div class="container-fluid mt-3">
    <?php
      echo $footer -> getFooter();
    ?>
  </div>
</body>

</html>