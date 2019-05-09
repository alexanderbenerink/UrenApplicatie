$( document ).ready( function() {

  var date = new Date();
  
  $( "#datepicker" ).datepicker({
    dateFormat: "DD, dd-mm-yy",
    showWeek: true,
    changeMonth: true,
    changeYear: true,
    onSelect: function() {
      //routine();
      personalRoutine();
    }
  });
  
  $( "#today" ).click( function() {
    $( "#datepicker" ).datepicker("setDate", new Date() );
    routine();
    personalRoutine();
  });

  $( "#next-day" ).click( function() {
    var date = $( "#datepicker" ).datepicker("getDate" );
    var nextDate = getNextDate( date );
    $( "#datepicker" ).datepicker("setDate", nextDate );
    routine();
    personalRoutine();
  });

  $( "#prev-day" ).click( function() {
    var date = $( "#datepicker" ).datepicker("getDate" );
    var nextDate = getPrevDate( date );
    $( "#datepicker" ).datepicker("setDate", nextDate );
    routine();
    personalRoutine();
  });

  function personalRoutine() {
    setHiddenDate();
    compareDates( date, $("#datepicker").datepicker("getDate"), collectData );
  }

});

// Formateer de huidige datum naar yy-mm-dd zodat het een geschikt datum object is voor de database. Zet het daarna in een hidden input field voor $_POST
function setHiddenDate() {
  var date = $("#datepicker").datepicker("getDate");
  var format = getFormattedDate( "yy-mm-dd", date);
  document.getElementById("date").value = format;
}

// Vergelijk twee datums en voer de callback collectData() uit wanneer newDate kleiner is dan date
function compareDates( date, newDate, callback ) {
  if ( newDate <= date ) {
    newDate = getFormattedDate("yy-mm-dd", newDate);
    callback( newDate, displayResult ); 
  } else {
    emptyResults();
  }
}

// Aanvraag op database om mogelijke gewerkte uren op te halen
function collectData( date, callback ) {
  $.ajax({
    type: "POST",
    url: "php/library/urenregistratie-api.php",
    data: { date: date },
    success: function( data ) {
      var result = JSON.parse( data );
      callback( result );
    }
  });
}

function displayResult( hours ) {
  emptyResults();
  for ( var i = 0; i < hours.length; i++ ) {
    var wrapper = "<div class='hour-wrapper'>";
    wrapper += "<div class='row pl-2 pt-2'>"
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].project + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].start + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].eind + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].pauze + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].status + "</p></div>";
    wrapper += "</div></div>"; 
    $( "#results" ).append( wrapper );
  }
}

function emptyResults() {
  $("#results").empty();
}