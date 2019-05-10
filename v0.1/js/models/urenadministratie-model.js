// De routine aan handeling per verandering van datum
function routine() {
  displayWeekNumber();
}

// Geef per verandering van week het nieuwe week nummer weer
function displayWeekNumber() {
  var date = $( "#datepicker" ).datepicker("getDate");
  var weekNumber = getWeekNumber( date );
  $( "#week-number" ).html( "Week " + weekNumber );
}

// Return: Week nummer op basis van datum
function getWeekNumber( date ) {
  var weekNumber = $.datepicker.iso8601Week( date );
  return weekNumber;
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

$( "#today" ).click( function() {
  $( "#datepicker" ).datepicker("setDate", new Date() );
});

$( "#next-day" ).click( function() {
  var date = $( "#datepicker" ).datepicker("getDate" );
  var nextDate = getNextDate( date );
  $( "#datepicker" ).datepicker("setDate", nextDate );
  routine();
});

$( "#prev-day" ).click( function() {
  var date = $( "#datepicker" ).datepicker("getDate" );
  var nextDate = getPrevDate( date );
  $( "#datepicker" ).datepicker("setDate", nextDate );
  routine();
});