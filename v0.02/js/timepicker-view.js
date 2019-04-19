$( document ).ready( function() {
  // Geef de start en eind input velden van elke form een timepicker mee
  $("form").each(function(){
    $(this).find('#start').timepicker({
      timeFormat: 'HH:mm',
      defaultValue: "08:00",
      parse: "loose"
    });
    $(this).find('#end').timepicker({
      timeFormat: 'HH:mm',
      defaultValue: "08:00"
    });
  });
});