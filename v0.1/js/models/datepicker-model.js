$( document ).ready( function() {

  $( "#datepicker" ).datepicker({
    dateFormat: "DD, dd-mm-yy",
    showWeek: true,
    changeMonth: true,
    changeYear: true,
    onSelect: function() {
      routine();
      personalRoutine();
    }
  });

  $( "#datepicker" ).datepicker("setDate", new Date() );

});