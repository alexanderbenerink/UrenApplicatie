$( document ).ready( function() {
  var date = new Date();
  date.setDate( date.getDate() );

  $( "#datepicker" ).datepicker({
    dateFormat: "DD, dd-mm-yy",
    defaultDate: date,
    showWeek: true,
    changeMonth: true,
    changeYear: true,
    onSelect: function() {
      selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
      changeDate();
    }
  });

  $("#datepicker").datepicker("setDate", date);
  displayWeekNumber( getWeekNumber() ); 
  setDates( getWeekNumber() );

  function getWeekNumber() {
    var date = $( "#datepicker" ).datepicker("getDate");
    var weekNumber = $.datepicker.iso8601Week( date );
    return weekNumber;
  }

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

  function getNextDate( date ) {
    var nextDate = date;
    nextDate.setTime( nextDate.getTime() + (1000*60*60*24) );
    return nextDate;
  }

  function getFormattedDate( format, date ) {
    return $.datepicker.formatDate(format, date);
  }

  function displayWeekNumber( weekNumber ) {
    var p = document.getElementById("week-number");
    p.innerHTML = "Week: " + weekNumber;
  }

  function setDates( weekNumber ) {
    var currentDate = $("#datepicker").datepicker("getDate");
    var year = getFormattedDate("yy", currentDate);
    var date = getFirstDayOfTheWeek( year, weekNumber );
    for ( var i = 0; i < 7; i++ ) {
      var formattedDate = getFormattedDate( "DD, dd-mm-yy", date );
      var p = document.getElementById("date-day-" + (i+1));
      p.innerHTML = formattedDate;
      date = getNextDate( date );
    }
  }

  function changeDate(){
    displayWeekNumber( getWeekNumber() ); 
    setDates( getWeekNumber() );
  }
});