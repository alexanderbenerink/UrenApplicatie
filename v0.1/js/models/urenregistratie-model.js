$( document ).ready( function() {
  routine();
  personalRoutine();
});

function personalRoutine() {
  setHiddenDate();
  collectData( displayResult );
}

// Formateer de huidige datum naar yy-mm-dd zodat het een geschikt datum object is voor de database. Zet het daarna in een hidden input field voor $_POST
function setHiddenDate() {
  var date = $("#datepicker").datepicker("getDate");
  var format = getFormattedDate( "yy-mm-dd", date);
  document.getElementById("date").value = format;
}

// Aanvraag op database om mogelijke gewerkte uren op te halen
function collectData( callback ) {
  var date = getFormattedDate( "yy-mm-dd", $("#datepicker").datepicker("getDate") );
  $.ajax({
    type: "POST",
    url: "php/library/db-urenadministratie-api.php",
    data: { view: "urenregistratie", date: date },
    success: function( data ) {
      var result = JSON.parse( data );
      callback( result );
    }
  });
}

function displayResult( hours ) {
  $("#results").empty();
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

$( "#today" ).click( function() {
  personalRoutine();
});

$( "#next-day" ).click( function() {
  personalRoutine();
});

$( "#prev-day" ).click( function() {
  personalRoutine();
});

