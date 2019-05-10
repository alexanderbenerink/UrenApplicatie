$( document ).ready( function() {
  $( "form[name='form-hours']" ).find("#start").timepicker({
    timeFormat: "HH:mm",
    defaultValue: "08:00"
  });
  $( "form[name='form-hours']" ).find("#end").timepicker({
    timeFormat: "HH:mm",
    defaultValue: "08:00"
  });
});