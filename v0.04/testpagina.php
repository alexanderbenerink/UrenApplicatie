<!DOCTYPE html>
<html lang="nl">

<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  $header = new Header();
  $head = new Head();
?>

<head>
  <title> Test pagina </title>
  <?php
    echo $head -> getHead();
    echo $head -> getJQueryUiCdn();
    echo $head -> getTimePicker();
  ?>
  <script>
    $(function(){
      $("#start").timepicker({
        timeFormat: 'HH:mm',
        defaultValue: "08:00"
      })
      $("#end").timepicker({
        timeFormat: 'HH:mm',
        defaultValue: "08:00"
      })
    });
  </script>
</head>

<body>
  <?php
    echo $header -> getHeader();
  ?>
  <main>
    <h1>Test pagina</h1>
    <hr>
    <section>
      <h2>Uren berekenaar</h2>
      <p>Bereken het verschil in uren en minuten tussen twee tijden op dezelfde dag.</p>
      <label for="start">Starttijd: </label>
      <input type="text" id="start" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}"><br><br>
      <label for="end">Eindtijd: </label>
      <input type="text" id="end" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" ><br><br>
      <label for="pause">Pauze in minuten: </label>
      <input type="number" id="pause" min="0" value="0"><br><br>
      <button id="button">Bereken</button><br><br>
      <label for="result">Verschil: </label>
      <input type="text" id="result" style="width: 250px" disabled>
    </section>
  </main>

  <script src="js/@tests/hour-calculator-test.js"></script>
</body>

</html>