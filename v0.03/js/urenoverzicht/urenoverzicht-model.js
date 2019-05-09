$( document ).ready( function() {
  collectData( displayResult );
});

// Aanvraag op database om gewerkte uren op te halen
function collectData( callback ) {
  $.ajax({
    type: "POST",
    url: "php/library/urenoverzicht-api.php",
    data: {},
    success: function( data ) {
      var result = JSON.parse( data );
      callback( result );
    }
  });
}

function displayResult( hours ) {
  for ( var i = 0; i < hours.length; i++ ) {
    var date = getFormattedDate( "DD, dd-mm-yy", new Date(hours[i].datum) );

    var startHour = parseInt(hours[i].start.substring( 0, hours[i].start.indexOf(":")) );
    var startMinutes = parseInt(hours[i].start.substring(hours[i].start.indexOf(":") + 1 ) );
    var endHour = parseInt(hours[i].eind.substring( 0, hours[i].eind.indexOf(":")) );
    var endMinutes = parseInt(hours[i].eind.substring(hours[i].eind.indexOf(":") + 1 )) ;
    var pause = hours[i].pauze;
    var workedHours = calculate( startHour, startMinutes, endHour, endMinutes, pause );

    var validationDate;
    if ( hours[i].validate_datum == null ) { validationDate = "-"; }
    else { validationDate = hours[i].validate_datum; }

    var wrapper = "<div class='hour-wrapper'>";
    wrapper += "<div class='row pl-2 pt-2'>"
    wrapper += "<div class='col-md'><p class='mb-2'>" + date + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].project + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].start + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].eind + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].pauze + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + workedHours + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].status + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].aanvraag_datum + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + validationDate + "</p></div>";
    wrapper += "</div></div>"; 
    $( "#results" ).append( wrapper );
  }
}

// Return: Geformatteerde datum
function getFormattedDate( format, date ) {
  return $.datepicker.formatDate(format, date);
}