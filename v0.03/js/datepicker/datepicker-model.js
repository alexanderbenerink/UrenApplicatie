$( document ).ready( function() {
  routine();
});

// De routine aan handeling per verandering van datum
function routine() {
  displayWeekNumber();
}

// Geef per verandering van week het nieuwe week nummer weer
function displayWeekNumber() {
  var date = getDate( "#datepicker" );
  var weekNumber = getWeekNumber( date );
  $( "#week-number" ).html( "Week " + weekNumber );
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

// Return: De dag na date
function getNextDate( date ) {
  var nextDate = date;
  nextDate.setTime( nextDate.getTime() + (1000*60*60*24) );
  return nextDate;
}

// Return: De dag voor date
function getPrevDate( date ) {
  var nextDate = date;
  nextDate.setTime( nextDate.getTime() - (1000*60*60*24) );
  return nextDate;
}

// Return: Geformatteerde datum
function getFormattedDate( format, date ) {
  return $.datepicker.formatDate(format, date);
}