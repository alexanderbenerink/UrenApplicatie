$( document ).ready( function() {
  $( "form[name='form-work-hours']" ).find("#start").timepicker({
    timeFormat: "HH:mm",
    defaultValue: "08:00"
  });
  $( "form[name='form-work-hours']" ).find("#end").timepicker({
    timeFormat: "HH:mm",
    defaultValue: "08:00"
  });
});