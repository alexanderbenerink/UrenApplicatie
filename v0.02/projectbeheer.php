<html lang="nl">

<?php
  require_once "php/Classes/Header.php";
  require_once "php/Classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Project beheer </title>
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
      <h1>Project beheer</h1>
    </main>
    <p>Project aanmaken</p>
    <form name="form-project" action="php/project-validator.php" method="POST">
      <input type="text" name="project" placeholder="project" required style="width: 250px">
      <input type="submit" value="Create">
    </form>
  </div>
</body>

</html>