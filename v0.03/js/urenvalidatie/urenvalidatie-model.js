$( document ).ready( function() {
  collectData( displayResult );
});

// Aanvraag op database om gewerkte uren op te halen
function collectData( callback ) {
  $.ajax({
    type: "POST",
    url: "php/library/urenvalidatie-api.php",
    data: {},
    success: function( data ) {
      var result = JSON.parse( data );
      callback( result );
    }
  });
}

function displayResult( hours ) {
  $( "#results" ).empty();
  for ( var i = 0; i < hours.length; i++ ) {
    var date = getFormattedDate( "DD, dd-mm-yy", new Date(hours[i].datum) );

    var startHour = parseInt(hours[i].start.substring( 0, hours[i].start.indexOf(":")) );
    var startMinutes = parseInt(hours[i].start.substring(hours[i].start.indexOf(":") + 1 ) );
    var endHour = parseInt(hours[i].eind.substring( 0, hours[i].eind.indexOf(":")) );
    var endMinutes = parseInt(hours[i].eind.substring(hours[i].eind.indexOf(":") + 1 )) ;
    var pause = hours[i].pauze;
    var workedHours = calculate( startHour, startMinutes, endHour, endMinutes, pause );

    var wrapper = "<div class='hour-wrapper'>";
    wrapper += "<div class='row pl-2 pt-2'>"
    wrapper += "<div class='col-md'><p class='mb-2'>" + date + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].persoon + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].project + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].start + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].eind + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].pauze + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + workedHours + "</p></div>";
    wrapper += "<div class='col-md'><p class='mb-2'>" + hours[i].aanvraag_datum + "</p></div>";
    wrapper += "<div class='col-md'><button onclick='acceptHours(" + hours[i].id + ")'>Valideer</button>";
    wrapper += "<button onclick='declineHours(" +  hours[i].id + ")'>Keur af</button></div>";
    wrapper += "</div></div></div>"; 
    $( "#results" ).append( wrapper );
  }
}

// Return: Geformatteerde datum
function getFormattedDate( format, date ) {
  return $.datepicker.formatDate(format, date);
}

function acceptHours( id ) {
  var date = new Date();
  var month = date.getMonth()+1;
  var day = date.getDate();
  var hour = date.getHours();
  var minute = date.getMinutes();
  var second = date.getSeconds();

  var output = date.getFullYear() + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    ((''+day).length<2 ? '0' : '') + day + ' ' +
    ((''+hour).length<2 ? '0' :'') + hour + ':' +
    ((''+minute).length<2 ? '0' :'') + minute + ':' +
    ((''+second).length<2 ? '0' :'') + second;

  $.ajax({
    type: "POST",
    url: "php/library/urenmutatie-api.php",
    data: { id: id, action : "accept", date : output },
    success: function( data ) {
      collectData( displayResult );
    }
  });
}

function declineHours( id ) {
  $.ajax({
    type: "POST",
    url: "php/library/urenmutatie-api.php",
    data: { id: id, action : "decline" },
    success: function( data ) {
      collectData( displayResult );
    }
  });
}
