// Return: Het verschil in uren en minuten tussen twee tijden op dezelfde dag
function calculate( startHour, startMinutes, endHour, endMinutes, pause ) {
  var hours = 0;
  var minutes = 0;
  // Bereken de hoeveelheid minuten nodig voor het volgende uur. Compenseer vervolgens het start uur door er 1 bij op te tellen.
  if ( startMinutes != 0 ) {
    minutes = 60 - startMinutes;
    startHour++;
  }
  // Bereken het verschil in uren
  hours = endHour - startHour;
  // Tel het verschil in uren als minuten bij totaal minuten op
  minutes += getMinutes(hours) + endMinutes;
  // Trek het aantal pauze minuten van het totaal aantal af
  minutes -= pause;
  // Bereken hoeveelheid uren en minuten
  var time = getTime( minutes );
  return time;
}

// Return: value van object
function getInput( object ) {
  var value = $( object ).val();
  return value;
}

// Return: Hoeveelheid minuten in hours
function getMinutes( hours ) {
  return hours * 60;
}

// Return: String met de hoeveelheid uren en overgebleven minuten
function getTime( minutes ) { 
  var totalHours = parseInt( minutes / 60 );
  minutes = minutes - ( 60 * totalHours );
  return totalHours + " uur en " + minutes + " minuten";
}