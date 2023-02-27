// Call the dataTables jQuery plugin
$(document).ready(function() {
  var table = $('#dataTable').DataTable();
  $('#select_dari').change(function(){
    table.column(2).search($(this).val()).draw() ;
})
});

function dari()
{
  // var table = $('#dataTable').DataTable();
  // var value = document.getElementById('select_dari').value;
  // table.search($(this).val()).draw()
}
// $('#dataTable').append('<label>&nbsp; Dari:</label>');
// $('#dataTable').append('<select class="form-control input-sm oke" data-live-search="true" id="am_aplicacion_id"></select>');
// am_aplicacion_ids = [{0: 'All Apps'}, {1: 'App ID 1'}, {2: 'App ID 2'}];
// for (var key in am_aplicacion_ids) {
//     var obj = am_aplicacion_ids[key];
//     for (var prop in obj) {
//         if (obj.hasOwnProperty(prop)) {
//             $('#am_aplicacion_id').append('<option value="' + prop + '">' + obj[prop] + '</option>');
//         }
//     }
// }
// $('.oke').selectpicker('refresh');