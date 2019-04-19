$( document ).ready( function() {
  routine();
});

// De routine aan handeling per verandering van datum
function routine() {
  displayWeekNumber( getFirstDay );
}

// Geef per verandering van week het nieuwe week nummer weer
function displayWeekNumber( callback ) {
  var date = getDate( "#datepicker" );
  var weekNumber = getWeekNumber( date );
  $( "#week-number" ).html( "Week " + weekNumber );
  callback( date, weekNumber, getWeekDays );
}

// Haal eerste dag van de week op
function getFirstDay( date, weekNumber, callback ) {
  var year = getFormattedDate("yy", date);
  var firstDayOfWeek = getFirstDayOfTheWeek( 2019, weekNumber );
  callback( firstDayOfWeek, checkDatesInDB );
}

// Return: Dagen van een week
function getWeekDays( firstDay, callback ) {
  var days = [];
  days.push( new Object( getFormattedDate("dd-mm-yy", firstDay) ) );
  for ( var i = 1; i < 7; i++ ) {
    var nextDate = getNextDate(firstDay);
    days.push( new Object( getFormattedDate("dd-mm-yy", nextDate) ) );
    firstDay = nextDate;
  }
  callback( days, displayDBResults );
}

// Aanvraag op database om te controleren of huidige reeks aan datums al in de database voorkomen
function checkDatesInDB( weekDays, callback ) {
  $.ajax({
    type: "POST",
    url: "php/check-dates-in-db.php",
    data: { status: weekDays },
    success: function( data ){
      var result = JSON.parse( data );
      callback( result );
    },
  });
}

// Vul de gegevens van een datum in wanneer deze in het database voorkomt. Laat anders de velden leeg
function displayDBResults( weekDays ) {
  for ( var i = 0; i < weekDays.length; i++ ) {
    var number = i + 1;
    var date = new Date( weekDays[i].date );
    document.getElementById("day-" + number).innerHTML = weekDays[i].date;
    document.getElementById("date-" + number).value = weekDays[i].date;
    var form = document.forms["form-day-" + number];
    var fieldset = document.getElementById("fieldset-day-" + number);
    var p = document.getElementById("status-day-" + number);
    if ( weekDays[i].name == "record" ) {
      fieldset.disabled = true;
      form["project"].value = weekDays[i].project;
      form["start"].value = weekDays[i].start;
      form["end"].value = weekDays[i].end;
      form["pause"].value = weekDays[i].pause;
      p.innerHTML = weekDays[i].status;
      if ( weekDays[i].status == "Gevalideerd" ) { p.classList.add("hour-validated"); }
      else if ( weekDays[i].status == "In afwachting" ) { p.classList.add("hour-pending"); }
    } else {
      form["start"].value = "00:00";
      form["end"].value = "00:00";
      form["pause"].value = "00:00";
      form["pause"].value = 0;
      fieldset.disabled = false;
      p.innerHTML = "Open";
      p.className = "";
    }
  }
}

// Return: Week nummer op basis van datum
function getWeekNumber( date ) {
  var weekNumber = $.datepicker.iso8601Week( date );
  return weekNumber;
}

// Return: Datum die actief staat in datepicker
function getDate( selector ) {
  return date = $( selector ).datepicker("getDate");
}

// Return: Eerste dag van een week
function getFirstDayOfTheWeek( year, week ) {
  var date = new Date( year, 0, 1 );
  var dayNum = date.getDay();
  var diff = --week * 7;
  // If 1 Jan is Friday to Sunday, go to next week
  if ( !dayNum || dayNum > 4 ) {
    diff += 7;
  }
  // Add required number of days
  date.setDate( date.getDate() - date.getDay() + ++diff );
  return date;
}

// Return: De dag na date
function getNextDate( date ) {
  var nextDate = date;
  nextDate.setTime( nextDate.getTime() + (1000*60*60*24) );
  return nextDate;
}

// Return: Geformatteerde datum
function getFormattedDate( format, date ) {
  return $.datepicker.formatDate(format, date);
}