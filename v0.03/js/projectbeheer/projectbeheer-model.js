$( document ).ready( function() {
  collectData( displayResult );
});

// Aanvraag op database om gewerkte uren op te halen
function collectData( callback ) {
  $.ajax({
    type: "POST",
    url: "php/library/projectbeheer-api.php",
    data: {},
    success: function( data ) {
      var result = JSON.parse( data );
      callback( result );
    }
  });
}

function displayResult( projects ) {
  $( "#results" ).empty();
  for ( var i = 0; i < projects.length; i++ ) {
    var wrapper = "<div class='hour-wrapper'>";
    wrapper += "<div class='row pl-2 pt-2'>"
    wrapper += "<div class='col-md'><p class='mb-2'>" + projects[i].naam + "</p></div>";
    wrapper += "<div class='col-md'><button onclick='deleteProject(" +  projects[i].id + ")'>Verwijder</button></div>";
    wrapper += "</div></div>"; 
    $( "#results" ).append( wrapper );
  }
}

function deleteProject( id ) {
  $.ajax({
    type: "POST",
    url: "php/library/project-api.php",
    data: { id: id },
    success: function( data ) {
      collectData( displayResult );
    }
  });
}