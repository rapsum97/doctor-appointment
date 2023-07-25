jQuery(document).ready(function() {
  jQuery('#user_image').on('change', function() {
    jQuery(this).next('.custom-file-label').html(jQuery(this).val());
  });
  // Datatables
  jQuery('#data_table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true ,
    "responsive": true,
  });
  // DateTime Picker
  var dateToday = new Date();
  jQuery('#datetimeslot').datetimepicker({ icons: { time: 'far fa-clock' }, format: 'YYYY-MM-DD' });
  jQuery('#datetimeslot_front').datetimepicker({ icons: { time: 'far fa-clock' }, format: 'YYYY-MM-DD' });
  // Appointment Details
  jQuery('.appointment_time_details input').on('click', function() {
    var radioValue = $(".appointment_time_details input[name='time_app']:checked").attr('data-id');
    jQuery('.appointment_time_details').css({
      'color': '',
      'background-color': '',
      'border-color': ''
    });
    jQuery('.appointment_time_details.appointment_time_details_'+radioValue).css({
      'color': '#fff',
      'background-color': '#6c757d',
      'border-color': '#6c757d'
    });
  });
});