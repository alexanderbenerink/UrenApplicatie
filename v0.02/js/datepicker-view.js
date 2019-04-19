$( document ).ready( function(){

  var date = new Date();

  $( "#datepicker" ).datepicker({
    dateFormat: "DD, dd-mm-yy",
    //defaultDate: date,
    showWeek: true,
    changeMonth: true,
    changeYear: true,
    onSelect: function() {
      routine();
    }
  });

  $("#datepicker").datepicker("setDate", date);

});